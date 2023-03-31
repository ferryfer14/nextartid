<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\ConfigPoint;
use Illuminate\Http\Request;
use App\Models\Pricing;
use DB;
use Image;
use Cache;

class ConfigPointController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function edit()
    {
        $point = ConfigPoint::findOrFail($this->request->route('id'));

        return view('backend.config-point.form')
            ->with('point', $point);
    }

    public function editPost()
    {
        $this->request->validate([
            'point' => 'required|numeric',
            'idr' => 'required|numeric',
            'cal_idr' => 'required|numeric',
        ]);
        $point = ConfigPoint::findOrFail($this->request->route('id'));
        $point->fill($this->request->except('_token'));
        $point->save();
        return redirect()->route('backend.config.point.edit', ['1'])->with('status', 'success')->with('message', 'Pricing successfully edited!');
    }
}