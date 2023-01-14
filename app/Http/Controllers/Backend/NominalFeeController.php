<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\NominalFee;
use App\Models\NominalNpwp;
use Illuminate\Http\Request;
use App\Models\Pricing;
use DB;
use Image;
use Cache;

class NominalFeeController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function edit()
    {
        $nominal_fee = NominalFee::findOrFail($this->request->route('id'));

        return view('backend.nominal-fee.form')
            ->with('nominal_fee', $nominal_fee);
    }

    public function editPost()
    {
        $this->request->validate([
            'fee_withdraw' => 'required|numeric',
            'exchange_rate_gap' => 'required|numeric',
            'min_convert' => 'required|numeric',
        ]);

        $nominal_fee = NominalFee::findOrFail($this->request->route('id'));

        $nominal_fee->fill($this->request->except('_token'));

        $nominal_fee->save();
        return redirect()->route('backend.nominal.fee.edit', ['1'])->with('status', 'success')->with('message', 'Nominal Fee successfully edited!');
    }
}