<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\GroupGenre;
use Illuminate\Http\Request;
use DB;
use Image;
use Cache;

class GroupGenreController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $group_genre = GroupGenre::orderBy('discover', 'desc')->orderBy('priority', 'asc');

        if ($this->request->has('term'))
        {
            $group_genre = $group_genre->where('name', 'like', '%' . $this->request->input('term') . '%');
        }

        $group_genre = $group_genre->paginate(50);

        return view('backend.group-genre.index')->with('group_genre', $group_genre);
    }

    public function sort()
    {
        $groupIds = $this->request->input('groupIds');

        foreach ($groupIds AS $index => $groupId) {
            DB::table('group_genres')
                ->where('id', $groupId)
                ->update(['priority' => $index + 1]);
        }

        Cache::clear('discover');

        return redirect()->route('backend.group-genre')->with('status', 'success')->with('message', 'Priority successfully changed!');
    }

    public function delete()
    {
        if(!Album::withoutGlobalScopes()->where('group_genre', $this->request->route('id'))->exists()) {
            GroupGenre::where('id', $this->request->route('id'))->delete();
            Cache::clear('discover');
            return redirect()->route('backend.group-genre')->with('status', 'success')->with('message', 'Group genre successfully deleted!');
        }else{
            return redirect()->route('backend.group-genre')->with('status', 'failed')->with('message', 'Group genre already use in any album!');
        }
    }

    public function add()
    {
        return view('backend.group-genre.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'name' => 'required|string|unique:group_genres',
            'artwork' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
        ]);

        $group_genre = new GroupGenre();
        $group_genre->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $group_genre->discover = 1;
        } else {
            $group_genre->discover = 0;
        }

        $group_genre->save();

        if ($this->request->hasFile('artwork'))
        {
            $group_genre->clearMediaCollection('artwork');
            $group_genre->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)), intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        Cache::clear('discover');

        return redirect()->route('backend.group-genre')->with('status', 'success')->with('message', 'Group Genre successfully added!');
    }

    public function edit()
    {
        $group_genre = GroupGenre::findOrFail($this->request->route('id'));

        return view('backend.group-genre.form')
            ->with('group_genre', $group_genre);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50'
        ]);

        $group_genre = GroupGenre::findOrFail($this->request->route('id'));

        if($group_genre->name != $this->request->input('name')) {
            $this->request->validate([
                'name' => 'required|string|unique:group_genres',

            ]);
        }

        $group_genre->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $group_genre->discover = 1;
        } else {
            $group_genre->discover = 0;
        }

        if ($this->request->hasFile('artwork'))
        {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
            ]);

            $group_genre->clearMediaCollection('artwork');
            $group_genre->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)), intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        $group_genre->save();
        Cache::clear('discover');

        return redirect()->route('backend.group-genre')->with('status', 'success')->with('message', 'Group-genre successfully edited!');
    }
}