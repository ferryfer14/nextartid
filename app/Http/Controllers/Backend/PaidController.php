<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;

class PaidController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $transaction = Transaction::withoutGlobalScopes();

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        isset($_GET['created_from']) ? $created_from = date('Y-m-d',strtotime($_GET['created_from'])) : $created_from = '1970-01-01';
        isset($_GET['created_until']) ? $created_until = date('Y-m-d', strtotime($_GET['created_until'])) : $created_until = date('Y-m-d');
        
        $transaction = $transaction->join('albums','albums.id','transaction.album_id');
        $transaction = $transaction->whereRaw('transaction.status = 1 AND albums.title LIKE "%' . $term . '%" and date(transaction.updated_at) >= "'.$created_from.'" and date(transaction.updated_at) <= "'.$created_until.'"  or transaction.status = 1 AND transaction.transaction_id LIKE "%' . $term . '%" and date(transaction.updated_at) >= "'.$created_from.'" and date(transaction.updated_at) <= "'.$created_until.'"');
    

        $transaction = $transaction->paginate(20);

        return view('backend.paid.index')
            ->with('term', $term)
            ->with('paid', $transaction);
    }
}