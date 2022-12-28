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
use App\Imports\RoyaltiImport;
use App\Models\FileRoyalti;
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
        $file_royalti = FileRoyalti::withoutGlobalScopes()->latest()->first();
        return view('backend.album-royalti.index')
            ->with('file_royalti', $file_royalti);
    }

    public function exportPost()
    {
        $this->request->validate([
            'file' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt',
            'note' => 'required|string'
        ]);

        $filename = $this->request->file('file')->getClientOriginalName();
        $file_royalti = new FileRoyalti();
        $file_royalti->nama_file = $filename;
        $file_royalti->note = $this->request->input('note');
        $file_royalti->save();
        Excel::import(new RoyaltiImport, $this->request->file('file'));

        return redirect()->route('backend.album-royalti.index')->with('status', 'success')->with('message', 'Import Royalti successfully!');
    }
}