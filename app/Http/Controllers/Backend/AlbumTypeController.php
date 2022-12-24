<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\AlbumType;
use Illuminate\Http\Request;
use App\Models\Patner;
use DB;
use Image;
use Cache;

class AlbumTypeController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $albumType = AlbumType::orderBy('discover', 'desc')->orderBy('priority', 'asc');

        if ($this->request->has('term'))
        {
            $albumType = $albumType->where('name', 'like', '%' . $this->request->input('term') . '%');
        }

        $albumType = $albumType->paginate(50);

        return view('backend.album-type.index')->with('album_type', $albumType);
    }

    public function sort()
    {
        $typeIds = $this->request->input('typeIds');

        foreach ($typeIds AS $index => $typeId) {
            DB::table('album_types')
                ->where('id', $typeId)
                ->update(['priority' => $index + 1]);
        }

        Cache::clear('discover');

        return redirect()->route('backend.album.type')->with('status', 'success')->with('message', 'Priority successfully changed!');
    }

    public function delete()
    {
        AlbumType::where('id', $this->request->route('id'))->delete();
        Cache::clear('discover');
        return redirect()->route('backend.album.type')->with('status', 'success')->with('message', 'Album Type successfully deleted!');
    }

    public function add()
    {
        return view('backend.album-type.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'name' => 'required|string|unique:album_types',
            'min' => 'required|numeric|min:1',
            'max' => 'required|numeric|min:1',
        ]);

        $AlbumType = new AlbumType();
        $AlbumType->fill($this->request->except('_token'));
        $AlbumType->min = $this->request->input('min');
        $AlbumType->max = $this->request->input('max');
        $AlbumType->discover = 1;

        $AlbumType->save();

        Cache::clear('discover');

        return redirect()->route('backend.album.type')->with('status', 'success')->with('message', 'Album Type successfully added!');
    }

    public function edit()
    {
        $albumType = AlbumType::findOrFail($this->request->route('id'));

        return view('backend.album.type.form')
            ->with('album_type', $albumType);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50',
            'min' => 'required|number|min:1',
            'max' => 'required|number|min:1',
        ]);

        $patner = Patner::findOrFail($this->request->route('id'));

        if($patner->name != $this->request->input('name')) {
            $this->request->validate([
                'name' => 'required|string|unique:patners',

            ]);
        }

        $patner->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $patner->discover = 1;
        } else {
            $patner->discover = 0;
        }

        if ($this->request->hasFile('artwork'))
        {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 10240)
            ]);

            $patner->clearMediaCollection('artwork');
            $patner->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)), intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        $patner->save();
        Cache::clear('discover');

        return redirect()->route('backend.patners')->with('status', 'success')->with('message', 'Patner successfully edited!');
    }
}