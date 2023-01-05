<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Royalti;
use App\Models\Song;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use DB;

class UserRoyaltiController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $user = User::withoutGlobalScopes();
        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $user = $user->whereRaw('name LIKE "%' . $term . '%" or email LIKE "%' . $term . '%"');
        }

        $user = $user->paginate(20);

        return view('backend.user-royalti.index')
            ->with('term', $term)
            ->with('users', $user);
    }

    public function album()
    {
        $album = Album::withoutGlobalScopes()->where('artistIds', $this->request->route('id'))->where('paid','1');
        
        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $album = $album->whereRaw('title LIKE "%' . $term . '%"');
        }

        $album = $album->paginate(20);

        return view('backend.user-royalti.album')
            ->with('term', $term)
            ->with('albums', $album)
            ->with('artistIds', $this->request->route('id'));
    }

    public function song()
    {
        $song = Song::withoutGlobalScopes()->join('album_songs','album_songs.song_id','songs.id')->where('album_songs.album_id', $this->request->route('id'));
        
        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $song = $song->whereRaw('songs.title LIKE "%' . $term . '%"');
        }

        $song = $song->paginate(20);

        return view('backend.user-royalti.song')
            ->with('term', $term)
            ->with('songs', $song)
            ->with('artistIds', $this->request->route('artist_id'))
            ->with('album_id', $this->request->route('id'));
    }

    public function songDetail()
    {
        $royalti = Royalti::withoutGlobalScopes()->selectRaw('SUM(value) as value, patner')->where('song_id', $this->request->route('id'))->groupBy('patner');
        
        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        if($term) {
            $royalti = $royalti->whereRaw('patner LIKE "%' . $term . '%"');
        }

        $royalti = $royalti->paginate(20);

        return view('backend.user-royalti.song-detail')
            ->with('term', $term)
            ->with('royaltis', $royalti)
            ->with('artistIds', $this->request->route('artist_id'))
            ->with('album_id', $this->request->route('id'));
    }
}