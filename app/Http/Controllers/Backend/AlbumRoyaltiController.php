<?php
/**
 * Created by NextArt.
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
use App\Imports\UnconfirmImport;
use App\Models\FileRoyalti;
use App\Models\RoyaltiUnconfirm;
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

    public function unconfirm()
    {
        $unconfirm = RoyaltiUnconfirm::withoutGlobalScopes()->latest()->first();
        return view('backend.album-royalti.unconfirm')
            ->with('unconfirm', $unconfirm);
    }

    public function deleteUnconfirm()
    {
        DB::table('royalti_unconfirms')->delete();
        return redirect()->route('backend.album.royalti.unconfirm')->with('status', 'success')->with('message', 'Delete successfully!');
    }

    public function exportPost()
    {
        $this->request->validate([
            'file' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'note' => 'required|string'
        ]);

        $filename = $this->request->file('file')->getClientOriginalName();

        if(!FileRoyalti::withoutGlobalScopes()->where('nama_file', $filename)->exists()) {
            $file_royalti = new FileRoyalti();
            $file_royalti->nama_file = $filename;
            $file_royalti->note = $this->request->input('note');
            $file_royalti->save();
            Excel::import(new RoyaltiImport, $this->request->file('file'));

            return redirect()->route('backend.album.royalti')->with('status', 'success')->with('message', 'Import Royalti successfully!');
        }else{
            return redirect()->route('backend.album.royalti')->with('status', 'failed')->with('message', 'File Name already to used!');
        }
    }

    public function exportUnconfirmPost()
    {
        $this->request->validate([
            'file' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:10240',
        ]);

        Excel::import(new UnconfirmImport, $this->request->file('file'));

        return redirect()->route('backend.album.royalti.unconfirm')->with('status', 'success')->with('message', 'Import Unconfirm successfully!');
    }
}