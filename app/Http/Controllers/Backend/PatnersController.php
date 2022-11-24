<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Patner;
use DB;
use Image;
use Cache;

class PatnersController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $patner = Patner::orderBy('discover', 'desc')->orderBy('priority', 'asc');

        if ($this->request->has('term'))
        {
            $patner = $patner->where('name', 'like', '%' . $this->request->input('term') . '%');
        }

        $patner = $patner->paginate(50);

        return view('backend.patners.index')->with('patners', $patner);
    }

    public function sort()
    {
        $patnerIds = $this->request->input('patnerIds');

        foreach ($patnerIds AS $index => $patnerId) {
            DB::table('patners')
                ->where('id', $patnerId)
                ->update(['priority' => $index + 1]);
        }

        Cache::clear('discover');

        return redirect()->route('backend.patners')->with('status', 'success')->with('message', 'Priority successfully changed!');
    }

    public function delete()
    {
        Patner::where('id', $this->request->route('id'))->delete();
        Cache::clear('discover');
        return redirect()->route('backend.patners')->with('status', 'success')->with('message', 'Patners successfully deleted!');
    }

    public function add()
    {
        return view('backend.patners.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'name' => 'required|string|unique:patners',
        ]);

        $patner = new Patner();
        $patner->fill($this->request->except('_token'));

        if($this->request->input('discover')) {
            $patner->discover = 1;
        } else {
            $patner->discover = 0;
        }

        $patner->save();

        Cache::clear('discover');

        return redirect()->route('backend.patners')->with('status', 'success')->with('message', 'Patner successfully added!');
    }

    public function edit()
    {
        $patner = Patner::findOrFail($this->request->route('id'));

        return view('backend.patners.form')
            ->with('patner', $patner);
    }

    public function editPost()
    {
        $this->request->validate([
            'name' => 'nullable|string|max:50'
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

        $patner->save();
        Cache::clear('discover');

        return redirect()->route('backend.patners')->with('status', 'success')->with('message', 'Patner successfully edited!');
    }
}