<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\FreeSong;
use Illuminate\Http\Request;
use DB;
use Image;
use Cache;

class FreeSongController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $freeSong = FreeSong::orderBy('discover', 'desc')->orderBy('priority', 'asc');

        if ($this->request->has('term'))
        {
            $freeSong = $freeSong->where('name', 'like', '%' . $this->request->input('term') . '%');
        }

        $freeSong = $freeSong->paginate(50);

        return view('backend.free-song.index')->with('free_song', $freeSong);
    }

    public function sort()
    {
        $typeIds = $this->request->input('typeIds');

        foreach ($typeIds AS $index => $typeId) {
            DB::table('free_songs')
                ->where('id', $typeId)
                ->update(['priority' => $index + 1]);
        }

        Cache::clear('discover');

        return redirect()->route('backend.free.song')->with('status', 'success')->with('message', 'Priority successfully changed!');
    }

    public function delete()
    {
        FreeSong::where('id', $this->request->route('id'))->delete();
        Cache::clear('discover');
        return redirect()->route('backend.free.song')->with('status', 'success')->with('message', 'Free Song successfully deleted!');
    }

    public function add()
    {
        return view('backend.free-song.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'name' => 'required|string|unique:album_types',
            'min' => 'required|numeric|min:1',
            'free' => 'required|numeric|min:1',
        ]);

        $FreeSong = new FreeSong();
        $FreeSong->fill($this->request->except('_token'));
        $FreeSong->min = $this->request->input('min');
        $FreeSong->free = $this->request->input('free');
        $FreeSong->discover = 1;

        $FreeSong->save();

        Cache::clear('discover');

        return redirect()->route('backend.free.song')->with('status', 'success')->with('message', 'Free Song successfully added!');
    }

    public function edit()
    {
        $freeSong = FreeSong::findOrFail($this->request->route('id'));

        return view('backend.free-song.form')
            ->with('free_song', $freeSong);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50',
            'min' => 'required|numeric|min:1',
            'free' => 'required|numeric|min:1',
        ]);

        $freeSong = FreeSong::findOrFail($this->request->route('id'));

        if($freeSong->name != $this->request->input('name')) {
            $this->request->validate([
                'name' => 'required|string|unique:free_songs',

            ]);
        }

        $freeSong->fill($this->request->except('_token'));
        $freeSong->min = $this->request->input('min');
        $freeSong->free = $this->request->input('free');

        $freeSong->save();
        Cache::clear('discover');

        return redirect()->route('backend.free.song')->with('status', 'success')->with('message', 'Free Song successfully edited!');
    }
}