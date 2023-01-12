<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Balance;
use App\Models\ConvertRoyalti;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\WithdrawRoyalti;
use Illuminate\Http\Request;
use DB;

class ConvertRoyaltiController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        $convert = ConvertRoyalti::withoutGlobalScopes()->select('convert_royaltis.*','users.name')->where('status','1')->orderBy('convert_royaltis.id', 'desc');

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        isset($_GET['created_from']) ? $created_from = date('Y-m-d',strtotime($_GET['created_from'])) : $created_from = '1970-01-01';
        isset($_GET['created_until']) ? $created_until = date('Y-m-d', strtotime($_GET['created_until'])) : $created_until = date('Y-m-d');
        
        $convert = $convert->join('users','users.id','convert_royaltis.user_id');
        $convert = $convert->whereRaw('users.name LIKE "%' . $term . '%" and date(convert_royaltis.created_at) >= "'.$created_from.'" and date(convert_royaltis.created_at) <= "'.$created_until.'"');
    

        $convert = $convert->paginate(20);

        return view('backend.convert-royalti.index')
            ->with('term', $term)
            ->with('convert', $convert);
    }
}