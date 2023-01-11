<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
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
        if(!Album::withoutGlobalScopes()->where('type', $this->request->route('id'))->exists()) {
            AlbumType::where('id', $this->request->route('id'))->delete();
            Cache::clear('discover');
            return redirect()->route('backend.album.type')->with('status', 'success')->with('message', 'Album Type successfully deleted!');
        }else{
            return redirect()->route('backend.album.type')->with('status', 'failed')->with('message', 'Album Type already exist any album!');    
        }
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

        return view('backend.album-type.form')
            ->with('album_type', $albumType);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50',
            'min' => 'required|numeric|min:1',
            'max' => 'required|numeric|min:1',
        ]);

        $AlbumType = AlbumType::findOrFail($this->request->route('id'));

        if($AlbumType->name != $this->request->input('name')) {
            $this->request->validate([
                'name' => 'required|string|unique:patners',

            ]);
        }

        $AlbumType->fill($this->request->except('_token'));
        $AlbumType->min = $this->request->input('min');
        $AlbumType->max = $this->request->input('max');

        $AlbumType->save();
        Cache::clear('discover');

        return redirect()->route('backend.album.type')->with('status', 'success')->with('message', 'Album Type successfully edited!');
    }
}