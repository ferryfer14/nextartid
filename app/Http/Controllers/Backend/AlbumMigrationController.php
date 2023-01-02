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
use App\Imports\MigrationImport;
use App\Imports\RoyaltiImport;
use App\Models\FileRoyalti;
use Excel;

class AlbumMigrationController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('backend.album-migration.index');
    }

    public function exportPost()
    {
        $this->request->validate([
            'file' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt',
        ]);

        Excel::import(new MigrationImport, $this->request->file('file'));
        return redirect()->route('backend.album.migration')->with('status', 'success')->with('message', 'Import Migration successfully!');
    }
}