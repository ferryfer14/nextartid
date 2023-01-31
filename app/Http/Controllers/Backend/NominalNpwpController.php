<?php
/**
 * Created by NextArt.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Models\NominalNpwp;
use Illuminate\Http\Request;
use App\Models\Pricing;
use DB;
use Image;
use Cache;

class NominalNpwpController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function edit()
    {
        $nominal_npwp = NominalNpwp::findOrFail($this->request->route('id'));

        return view('backend.nominal-npwp.form')
            ->with('nominal_npwp', $nominal_npwp);
    }

    public function editPost()
    {
        $this->request->validate([
            'without_npwp' => 'required|numeric',
            'individual' => 'required|numeric',
            'organization' => 'required|numeric',
        ]);

        $nominal_npwp = NominalNpwp::findOrFail($this->request->route('id'));

        $nominal_npwp->fill($this->request->except('_token'));

        $nominal_npwp->save();
        DB::table('users')
            ->where('variant_npwp', 2)
            ->where('status_npwp', 1)
            ->update(['charge_tax' => $this->request->input('organization')]);

        DB::table('users')
            ->where('variant_npwp', 1)
            ->where('status_npwp', 1)
            ->update(['charge_tax' => $this->request->input('individual')]);

        DB::table('users')
        ->whereIn('status_npwp', [0,2])
        ->update(['charge_tax' => $this->request->input('without_npwp')]);
        return redirect()->route('backend.nominal.npwp.edit', ['1'])->with('status', 'success')->with('message', 'Nominal NPWP successfully edited!');
    }
}