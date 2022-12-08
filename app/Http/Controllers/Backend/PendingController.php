<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;

class PendingController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $transaction = Transaction::withoutGlobalScopes()->where('status','0')->orderBy('transaction.id', 'desc');

        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';

        if($term) {
            $transaction = $transaction->join('albums','albums.id','transaction.album_id');
            $transaction = $transaction->whereRaw('albums.title LIKE "%' . $term . '%" or transaction.transaction_id LIKE "%' . $term . '%"');
        }

        $transaction = $transaction->paginate(20);

        return view('backend.pending.index')
            ->with('term', $term)
            ->with('pending', $transaction);
    }
}