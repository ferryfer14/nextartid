<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 21:02
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Auth;

class VouchersController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        $vouchers = Voucher::paginate(20);

        return view('backend.vouchers.index')
            ->with('vouchers', $vouchers);
    }

    public function delete()
    {
        Page::where('id', $this->request->route('id'))->delete();
        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Static page successfully deleted!');
    }

    public function add()
    {
        return view('backend.vouchers.form');
    }

    public function addPost()
    {
        $this->request->validate([
            'code' => 'required|alpha|unique:vouchers',
            'amount' => 'nullable|int',
            'meta_title' => 'nullable|int',
            'usage_limit' => 'nullable|int',
        ]);

        $vouchers = new Voucher();
        $vouchers->fill($this->request->except('_token'));

        $vouchers->approved = $this->request->input('approved') ? 1 : 0;

        $vouchers->save();

        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Coupon successfully created!');
    }

    public function edit()
    {
        $vouchers = Voucher::findOrFail($this->request->route('id'));
        return view('backend.vouchers.form')->with('voucher', $vouchers);
    }

    public function editPost()
    {
        $this->request->validate([
            'amount' => 'nullable|int',
            'meta_title' => 'nullable|int',
            'usage_limit' => 'nullable|int',
        ]);

        $voucher = Voucher::findOrFail($this->request->route('id'));

        if($voucher->code != $this->request->input('code')) {
            $this->request->validate([
                'code' => 'required|alpha|unique:vouchers',
            ]);
        }

        $voucher->fill($this->request->except('_token'));
        $voucher->approved = $this->request->input('approved') ? 1 : 0;
        $voucher->save();

        return redirect()->route('backend.vouchers')->with('status', 'success')->with('message', 'Static page successfully created!');
    }
}