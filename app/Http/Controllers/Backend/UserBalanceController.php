<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Balance;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Royalti;
use App\Models\Song;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use DB;

class UserBalanceController
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

        return view('backend.user-balance.index')
            ->with('term', $term)
            ->with('users', $user);
    }

    public function detail()
    {
        $balance = Balance::withoutGlobalScopes()->where('user_id', $this->request->route('id'))->orderBy('created_at','DESC');
        
        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $balance = $balance->whereRaw('jenis LIKE "%' . $term . '%"');
        }

        $balance = $balance->paginate(20);

        return view('backend.user-balance.detail')
            ->with('term', $term)
            ->with('balances', $balance);
    }
}