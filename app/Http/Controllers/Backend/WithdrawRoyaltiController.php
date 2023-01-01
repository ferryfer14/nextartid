<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\WithdrawRoyalti;
use Illuminate\Http\Request;
use DB;

class WithdrawRoyaltiController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $withdraw = WithdrawRoyalti::withoutGlobalScopes()->where('status','0')->orderBy('withdraw_royaltis.id', 'desc');

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        isset($_GET['created_from']) ? $created_from = date('Y-m-d',strtotime($_GET['created_from'])) : $created_from = '1970-01-01';
        isset($_GET['created_until']) ? $created_until = date('Y-m-d', strtotime($_GET['created_until'])) : $created_until = date('Y-m-d');
        
        $withdraw = $withdraw->join('users','users.id','withdraw_royaltis.user_id');
        $withdraw = $withdraw->whereRaw('users.name LIKE "%' . $term . '%" and date(withdraw_royaltis.created_at) >= "'.$created_from.'" and date(withdraw_royaltis.created_at) <= "'.$created_until.'"');
    

        $withdraw = $withdraw->paginate(20);

        return view('backend.withdraw-royalti.index')
            ->with('term', $term)
            ->with('withdraw', $withdraw);
    }
}