<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Balance;
use App\Models\NominalNpwp;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawRoyalti;
use Illuminate\Http\Request;
use DB;

class UserNpwpController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $users = User::withoutGlobalScopes()->where('status_npwp',2);

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        
        $users = $users->whereRaw('name LIKE "%' . $term . '%"');
    

        $users = $users->paginate(20);

        return view('backend.user-npwp.index')
            ->with('term', $term)
            ->with('user', $users);
    }


    public function accept()
    {
        $user = User::withoutGlobalScopes()->where('id', $this->request->route('id'))->first();
        $user->status_npwp = 1;
        $nominal_npwp = NominalNpwp::withoutGlobalScopes()->where('id',1)->first();
        if($user->variant_npwp == 1){
            $user->charge_tax = $nominal_npwp->individual;
        }else{
            $user->charge_tax = $nominal_npwp->organization;
        }
        $user->save();
        return redirect()->route('backend.user.npwp')->with('status', 'success')->with('message', 'Request successfully approved!');
    }
}