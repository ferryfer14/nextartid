<?php
/**
 * Created by NextArt.
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

class UserArtistController
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

        return view('backend.user-artist.index')
            ->with('term', $term)
            ->with('users', $user);
    }
    public function edit()
    {
        $user = User::withoutGlobalScopes()->where('id',$this->request->route('id'))->first();

        return view('backend.user-artist.form')
            ->with('user', $user);
    }

    public function editPost()
    {
        $this->request->validate([
            'email' => 'required|string',
            'affiliation' => 'required|string',
            'max_artist' => 'required|numeric'
        ]);

        $user = User::findOrFail($this->request->route('id'));
        $user->affiliation = $this->request->input('affiliation');
        $user->max_artist = $this->request->input('max_artist');
        $user->save();
        return redirect()->route('backend.user.artist')->with('status', 'success')->with('message', 'User Artist successfully edited!');
    }
}