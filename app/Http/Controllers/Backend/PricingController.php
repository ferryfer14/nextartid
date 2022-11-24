<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Pricing;
use DB;
use Image;
use Cache;

class PricingController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function edit()
    {
        $pricing = Pricing::findOrFail($this->request->route('id'));

        return view('backend.pricing.form')
            ->with('pricing', $pricing);
    }

    public function editPost()
    {
        $this->request->validate([
            'harga' => 'required|numeric',
            'harga_discount' => 'required|numeric',
        ]);

        $pricing = Pricing::findOrFail($this->request->route('id'));

        if($pricing->harga != $this->request->input('harga')) {
            $this->request->validate([
                'harga' => 'required|numeric',
                'harga_discount' => 'required|numeric',
            ]);
        }

        $pricing->fill($this->request->except('_token'));

        $pricing->save();
        Cache::clear('discover');

        return redirect()->route('backend.pricing.edit', ['1'])->with('status', 'success')->with('message', 'Pricing successfully edited!');
    }
}