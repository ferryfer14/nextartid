<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Balance;
use App\Models\ConvertRoyalti;
use App\Models\LogEmail;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\WithdrawRoyalti;
use Illuminate\Http\Request;
use DB;

class LogEmailController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        $log = LogEmail::orderBy('id', 'desc');

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        
        $log = $log->where('email', 'LIKE', '%' . $term . '%');
    

        $log = $log->paginate(20);

        return view('backend.log-email.index')
            ->with('term', $term)
            ->with('log', $log);
    }
}