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
use App\Imports\SongImport;
use App\Models\FileRoyalti;
use App\Models\Upload;
use Closure;
use Excel;
use Illuminate\Http\UploadedFile;

class SongMigrationController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('backend.song-migration.index');
    }

    public function exportPost()
    {
        $this->request->validate([
            'file' => 'required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt',
        ]);

        Excel::import(new SongImport, $this->request->file('file'));

        /*$path = public_path('storage/file.wav');

        $mimeType = mime_content_type($path);
        $size = filesize ($path);
        $files =  new UploadedFile(base_path('public/storage/file.wav'), 'file_new.wav', $mimeType, null, true);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');  
        $request->initialize(['yourParam' => 2],[],[],[],['file' => $files]);  
        //$request = (new Request())->duplicate([], [], [], [], ['file' => $files], []);
        $res = (new Upload)->handle($request, 1, 12);*/
        return redirect()->route('backend.song.migration')->with('status', 'success')->with('message', 'Import Song successfully');
    }
}