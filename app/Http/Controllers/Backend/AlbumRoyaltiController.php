<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-25
 * Time: 09:02
 */

namespace App\Http\Controllers\Backend;

use App\Exports\AlbumRangeExport;
use App\Models\AlbumType;
use Illuminate\Http\Request;
use App\Models\Patner;
use DB;
use Image;
use Cache;
use App\Exports\AlbumsExport;
use Excel;

class AlbumRoyaltiController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('backend.album-royalti.index');
    }

    public function exportPost()
    {
        $this->request->validate([
            'file' => 'required|mimes:csv',
        ]);
        return Excel::download(new AlbumRangeExport($this->request->input('start'),$this->request->input('finish')), date('Ymd',strtotime($this->request->input('start'))).'_'.date('Ymd',strtotime($this->request->input('finish'))).'.csv');
    }
}