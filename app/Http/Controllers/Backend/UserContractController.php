<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use DB;

class UserContractController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $user = User::withoutGlobalScopes();

        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $user = $user->whereRaw('name LIKE "%' . $term . '%" or email LIKE "%' . $term . '%"');
        }

        $user = $user->paginate(20);

        return view('backend.user-contract.index')
            ->with('term', $term)
            ->with('user', $user);
    }

    public function edit()
    {
        $user = User::withoutGlobalScopes()->where('id',$this->request->route('id'))->first();

        return view('backend.user-contract.form')
            ->with('user', $user);
    }

    public function editPost()
    {
        $this->request->validate([
            'email' => 'required|string',
            'charge_admin' => 'required|numeric'
        ]);

        $user = User::findOrFail($this->request->route('id'));

        $user->charge_admin = $this->request->input('charge_admin');

        $user->save();
        return redirect()->route('backend.user.contract')->with('status', 'success')->with('message', 'Contract successfully edited!');
    }

}