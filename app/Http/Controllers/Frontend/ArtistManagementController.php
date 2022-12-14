<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-28
 * Time: 15:13
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Activity;
use App\Models\CountryLanguage;
use App\Models\Episode;
use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\Upload;
use App\Models\Withdraw;
use Carbon\Language;
use Illuminate\Http\Request;
use DB;
use PHPUnit\Exception;
use View;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Album;
use App\Models\AlbumArtist;
use App\Models\AlbumSong;
use App\Models\AlbumType;
use App\Models\ArtistsRoles;
use App\Models\Balance;
use App\Models\User;
use App\Models\Genre;
use App\Models\Mood;
use App\Models\Event;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\Role;
use App\Models\Country;
use App\Models\Patner;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Royalti;
use App\Models\Voucher;
use App\Models\WithdrawRoyalti;
use chillerlan\QRCode\QRCode;

class ArtistManagementController extends Controller
{
    private $request;
    private $artist;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('albums', $this->artist->albums()->withoutGlobalScopes()->paginate(20));
        $this->artist->setRelation('songs', $this->artist->songs()->with('tags')->orderBy('plays', 'desc')->paginate(10));
        $this->artist->follower_count = $this->artist->followers()->count();
        //$albums = Royalti::withoutGlobalScopes()->whereIn('song_id', DB::table('songs')->select('id as song_id')->where('artistIds',auth()->user()->artist_id)->get())->sum('value');
        //$songs = Song::withoutGlobalScopes()->select('id')->where('user_id', auth()->user()->id)->get();
        //$albums = Album::withoutGlobalScopes()->selectRaw('id')->where('artistIds',auth()->user()->artist_id)->get();
        //$songs = AlbumSong::withoutGlobalScopes()->select('song_id')->whereIn('album_id',$albums)->get();
        //$balance_confirm = Royalti::withoutGlobalScopes()->whereIn('song_id', )->sum('value');
        $counts = DB::table('popular')
            ->select(DB::raw('sum(plays) AS playSong'), DB::raw('sum(favorites) AS favoriteSong'),  DB::raw('sum(collections) AS collectSong'))
            ->where('artist_id', $this->artist->id)
            ->first();

        $songs_revenue = DB::table('stream_stats')
            ->select(DB::raw('sum(revenue) AS total, count(*) AS count'))
            ->where('streamable_type', (new Song)->getMorphClass())
            ->where('user_id', auth()->user()->id)
            ->first();

        $episodes_revenue = DB::table('stream_stats')
            ->select(DB::raw('sum(revenue) AS total, count(*) AS count'))
            ->where('streamable_type', (new Episode())->getMorphClass())
            ->where('user_id', auth()->user()->id)
            ->first();

        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        if( $this->request->is('api*') )
        {
            return response()->json(array(
                'artist' => $this->artist,
                'my_artist' => $my_artist,
                'albums' => $this->artist->albums,
                'songs' => $this->artist->songs,
                'songs_revenue' => $songs_revenue,
                'episodes_revenue' => $episodes_revenue,
                'counts' => $counts
            ));
        }

        $view = View::make('artist-management.index')
            ->with('songs', $this->artist->songs)
            ->with('albums', $this->artist->albums)
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist)
            //->with('my_song', $albums)
            ->with('songs_revenue', $songs_revenue)
            ->with('episodes_revenue', $episodes_revenue)
            ->with('counts', $counts);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function withdraw()
    {
        $this->request->validate([
            'amount' => 'required|integer',
        ]);

        if($this->request->amount > auth()->user()->balance ) {
            abort(403, "No, don't do this.");
        }
        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $this->request->amount;
        $withdraw->save();

        return response()->json(array(
            'success' => true,
        ));
    }

    public function reports()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);

        $view = View::make('artist-management.reports')
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function events()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->paginate(20));

        $view = View::make('artist-management.events')
            ->with('songs', $this->artist->songs)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function royaltiArtist()
    {
        $this->artist = Artist::withoutGlobalScopes()->where('user_id',auth()->user()->id)->get();
        
        $view = View::make('artist-management.royalti-artist')
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function dollarIdr()
    {
        $this->request->validate([
            'value'              => 'required|numeric',
        ]);
        
        $r=file_get_contents( "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/usd/idr.json");
        $json = json_decode($r, true);
        $json['admin'] = User::findOrFail(auth()->user()->id);
        return response()->json($json);
    }

    public function withdrawRoyalti()
    {
        $this->request->validate([
            'bank'              => 'required|numeric',
            'another_bank'      => 'required_if:bank,==,0|max:20',
            'account_name'      => 'required|string|max:50',
            'account_number'    => 'required|numeric:max:20',
            'value'             => 'required|numeric|min:0',
        ],
        [
            'another_bank.required_if' => 'The another bank field is required when bank is Another Bank'
        ]);

        $artist = Artist::findOrFail(auth()->user()->artist_id);
        if($this->request->input('value') <= round($artist->balance_confirm,3)){
            $balance = new Balance();
            $balance->user_id = auth()->user()->id;
            $balance->jenis = 'Withdraw royalti';
            $balance->value = -$this->request->input('value');
            $balance->status = 1;
            $balance->save();
            $withdraw = new WithdrawRoyalti();
            $withdraw->user_id = auth()->user()->id;
            $withdraw->bank = $this->request->input('bank') == 1 ? 'BCA' : $this->request->input('another_bank');
            $withdraw->name = $this->request->input('account_name');
            $withdraw->account_number = $this->request->input('account_number');
            $withdraw->value = $this->request->input('value');
            $withdraw->value_idr = $this->request->input('value_idr');
            $withdraw->value_tax = $this->request->input('value_tax');
            $withdraw->value_admin = $this->request->input('value_admin');
            $withdraw->value_total = $this->request->input('value_total');
            $withdraw->save();
    
            return response()->json([
                'statu' => 'success'
            ],200);
        }else{
            return response()->json([
                'message' => 'Your value exceeds the balance',
                'errors' => array('message' => array(__('web.POPUP_WITHDRAW_LIMIT_VALUE')))
            ], 403);
        }
    }

    public function uploaded()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $album = Album::withoutGlobalScopes()->where('artistIds', auth()->user()->artist_id)->where('paid','1')->get();
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $view = View::make('artist-management.uploaded')
            ->with('albums', $album)
            ->with('songs', $this->artist->songs)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function transaction()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->transaction = Transaction::withoutGlobalScopes()->where('transaction.user_id','=', auth()->user()->id)->paginate(20);
        $view = View::make('artist-management.transaction')
            ->with('transaction', $this->transaction)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function withdrawList()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $withdraw = WithdrawRoyalti::withoutGlobalScopes()->where('user_id','=', auth()->user()->id)->paginate(20);
        $view = View::make('artist-management.withdraw')
            ->with('withdraw', $withdraw)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }


    public function artists()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $artists = Artist::where('user_id',auth()->user()->id)->get();
        
        $view = View::make('artist-management.artists')
            ->with('artists', $artists)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function primary()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $album_artist = Album::withoutGlobalScopes()->select('ar.id', 'ar.artist_role','ar.artist_name','albums.user_id')
        ->join('album_artist as ar','albums.id','=','ar.album_id')
        ->where('albums.user_id',auth()->user()->id)->where('ar.artist_role','1')->groupBy('ar.artist_name')->get();

        $my_artist = array();
            array_push($my_artist,array("id" => 1, "name" => 'Primary Artist'));
            array_push($my_artist,array("id" => 2, "name" => 'Performer'));
            array_push($my_artist,array("id" => 3, "name" => 'Producer'));
            array_push($my_artist,array("id" => 4, "name" => 'Remixer'));
            array_push($my_artist,array("id" => 5, "name" => 'Composer'));
            array_push($my_artist,array("id" => 6, "name" => 'Lyricist'));
            array_push($my_artist,array("id" => 7, "name" => 'Publisher'));
            array_push($my_artist,array("id" => 8, "name" => 'Featuring'));
            array_push($my_artist,array("id" => 9, "name" => 'with'));
            array_push($my_artist,array("id" => 10, "name" => 'Arranger'));

        $view = View::make('artist-management.primary')
            ->with('participants', $album_artist)
            ->with('my_artist', $my_artist)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function composer()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $album_artist = Album::withoutGlobalScopes()->select('ar.id', 'ar.artist_role','ar.artist_name','albums.user_id')
        ->join('album_artist as ar','albums.id','=','ar.album_id')
        ->where('ar.artist_role','5')
        ->where('albums.user_id',auth()->user()->id)->groupBy('ar.artist_name')->get();

        $my_artist = array();
            array_push($my_artist,array("id" => 1, "name" => 'Primary Artist'));
            array_push($my_artist,array("id" => 2, "name" => 'Performer'));
            array_push($my_artist,array("id" => 3, "name" => 'Producer'));
            array_push($my_artist,array("id" => 4, "name" => 'Remixer'));
            array_push($my_artist,array("id" => 5, "name" => 'Composer'));
            array_push($my_artist,array("id" => 6, "name" => 'Lyricist'));
            array_push($my_artist,array("id" => 7, "name" => 'Publisher'));
            array_push($my_artist,array("id" => 8, "name" => 'Featuring'));
            array_push($my_artist,array("id" => 9, "name" => 'with'));
            array_push($my_artist,array("id" => 10, "name" => 'Arranger'));

        $view = View::make('artist-management.composer')
            ->with('participants', $album_artist)
            ->with('my_artist', $my_artist)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function arranger()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $album_artist = Album::withoutGlobalScopes()->select('ar.id', 'ar.artist_role','ar.artist_name','albums.user_id')
        ->join('album_artist as ar','albums.id','=','ar.album_id')
        ->where('ar.artist_role','10')
        ->where('albums.user_id',auth()->user()->id)->groupBy('ar.artist_name')->get();

        $my_artist = array();
            array_push($my_artist,array("id" => 1, "name" => 'Primary Artist'));
            array_push($my_artist,array("id" => 2, "name" => 'Performer'));
            array_push($my_artist,array("id" => 3, "name" => 'Producer'));
            array_push($my_artist,array("id" => 4, "name" => 'Remixer'));
            array_push($my_artist,array("id" => 5, "name" => 'Composer'));
            array_push($my_artist,array("id" => 6, "name" => 'Lyricist'));
            array_push($my_artist,array("id" => 7, "name" => 'Publisher'));
            array_push($my_artist,array("id" => 8, "name" => 'Featuring'));
            array_push($my_artist,array("id" => 9, "name" => 'with'));
            array_push($my_artist,array("id" => 10, "name" => 'Arranger'));

        $view = View::make('artist-management.arranger')
            ->with('participants', $album_artist)
            ->with('my_artist', $my_artist)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function participants()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('songs', $this->artist->songs()->withoutGlobalScopes()->with('tags')->orderBy('approved', 'asc')->latest()->paginate(20));

        $album_artist = Album::withoutGlobalScopes()->select('ar.id', 'ar.artist_role','ar.artist_name','albums.user_id')
        ->join('album_artist as ar','albums.id','=','ar.album_id')
        ->where('albums.user_id',auth()->user()->id)->groupBy('ar.artist_name')->get();

        $my_artist = array();
            array_push($my_artist,array("id" => 1, "name" => 'Primary Artist'));
            array_push($my_artist,array("id" => 2, "name" => 'Performer'));
            array_push($my_artist,array("id" => 3, "name" => 'Producer'));
            array_push($my_artist,array("id" => 4, "name" => 'Remixer'));
            array_push($my_artist,array("id" => 5, "name" => 'Composer'));
            array_push($my_artist,array("id" => 6, "name" => 'Lyricist'));
            array_push($my_artist,array("id" => 7, "name" => 'Publisher'));
            array_push($my_artist,array("id" => 8, "name" => 'Featuring'));
            array_push($my_artist,array("id" => 9, "name" => 'with'));
            array_push($my_artist,array("id" => 10, "name" => 'Arranger'));

        $view = View::make('artist-management.participants')
            ->with('participants', $album_artist)
            ->with('my_artist', $my_artist)
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }
    public function profile()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);

        $view = View::make('artist-management.profile')
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function saveProfile()
    {
        $artist = Artist::findOrFail(auth()->user()->artist_id);

        $this->request->validate([
            'name' => 'required|max:100',
            'location' => 'nullable|max:100',
            'website' => 'nullable|url|max:100',
            'facebook' => 'nullable|url|max:100',
            'twitter' => 'nullable|url|max:100',
            'youtube' => 'nullable|url|max:100',
            'instagram' => 'nullable|url|max:100',
            'soundcloud' => 'nullable|url|max:100',
            'bio' => 'nullable|max:180',
            'genre' => 'nullable|array',
            'mood' => 'nullable|array',
        ]);

        $artist->name = $this->request->input('name');
        $artist->location = $this->request->input('location');
        $artist->website = $this->request->input('website');
        $artist->facebook = $this->request->input('facebook');
        $artist->twitter = $this->request->input('twitter');
        $artist->youtube = $this->request->input('youtube');
        $artist->instagram = $this->request->input('instagram');
        $artist->soundcloud = $this->request->input('soundcloud');
        $artist->bio = $this->request->input('bio');

        $genre = $this->request->input('genre');
        $mood = $this->request->input('mood');

        if(is_array($genre))
        {
            $artist->genre = implode(",", $this->request->input('genre'));
        } else {
            $artist->genre = null;
        }

        if(is_array($mood))
        {
            $artist->mood = implode(",", $this->request->input('mood'));
        } else {
            $artist->mood = null;
        }

        if ($this->request->hasFile('artwork')) {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096)
            ]);
            $artist->clearMediaCollection('artwork');
            $artist->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        $artist->save();

        $user = auth()->user();

        if($this->request->input('payment_method') == 'paypal') {
            $this->request->validate([
                'paypal_email' => 'required|email',
            ]);
            $user->payment_method = 'paypal';
            $user->payment_paypal = $this->request->input('paypal_email');
            $user->save();
        }

        if($this->request->input('payment_method') == 'bank') {
            $this->request->validate([
                'bank_details' => 'required|string',
            ]);
            $user->payment_method = 'bank';
            $user->payment_bank = $this->request->input('bank_details');
            $user->save();
        }

        return response()->json($artist);
    }

    public function editSongPost()
    {
        $this->request->validate([
            'id' => 'required|numeric',
            'title' => 'required|max:100',
            'label' => 'nullable|string|max:50',
            'isrc' => 'nullable|string|max:50',
            'primary-artist' => 'required|string|max:50',
            'composer' => 'required|string|max:50',
            'arranger' => 'required|string|max:50',
            'lyricist' => 'required|string|max:50',
            'display_artist' => 'required',
            'genre' => 'required',
            'second_genre' => 'required',
            'group_genre' => 'required',
            'tag' => 'nullable|array',
            'copyright' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:280',
            'lirik' => 'nullable|string|max:1000',
            'selling' => 'nullable',
            //'start_point' => 'date_format:i:s',
            'language' => 'required',
            'release_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
            'created_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now()->addDays($this->minDateRelease())->toDateString(),
        ]);

        /**
         * Validate if song belong to artist (by user_id)
         */

        if(Song::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $song = Song::withoutGlobalScopes()->findOrFail($this->request->input('id'));

            if(isset($song->bpm)) {
                $this->request->validate([
                    'bpm' => 'required|numeric',
                ]);
            }

            if(intval(Role::getValue('artist_day_edit_limit')) != 0 && Carbon::parse($song->created_at)->addDay(Role::getValue('artist_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_EDIT_SONG_DENIED')))
                ], 403);
            } else {
                /**
                 * Change artwork if have to
                 */

                if ($this->request->hasFile('artwork')) {
                    $this->request->validate([
                        'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096)
                    ]);
                    $song->clearMediaCollection('artwork');
                    $song->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                        ->usingFileName(time(). '.jpg')
                        ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
                }

                if(isset($song->bpm)) {
                    $song->bpm = $this->request->input('bpm');
                }

                if ($this->request->hasFile('attachment')) {
                    $this->request->validate([
                        'attachment' => 'required|mimes:zip,rar|max:' . config('settings.max_attachment_file_size', 80960)
                    ]);
                    $song->clearMediaCollection('attachment');
                    $song->addMedia($this->request->file('attachment'))
                        ->toMediaCollection('attachment', config('settings.storage_audio_location', 'public'));
                }

                $song->type_song           = $this->request->input('type');
                $song->title               = $this->request->input('title');
                $song->display_artist      = $this->request->input('display_artist');
                $song->primary_artist      = $this->request->input('primary-artist');
                $song->remix_version            = $this->request->input('remix_version');
                $song->composer            = $this->request->input('composer');
                $song->arranger            = $this->request->input('arranger');
                $song->lyricist            = $this->request->input('lyricist');
                $song->label               = $this->request->input('label');
                $song->isrc               = $this->request->input('isrc');
                $song->iswc               = $this->request->input('iswc');
                $song->genre               = $this->request->input('genre');
                $song->second_genre        = $this->request->input('second_genre');
                $song->group_genre         = $this->request->input('group_genre');
                $song->language            = $this->request->input('language');
                $song->lirik                = $this->request->input('lirik');
                $song->start_point                = $this->request->input('start_point');
                $song->explicit                = $this->request->input('explicit');
                $song->separately                = $this->request->input('separately');
                $song->publisher_year        = $this->request->input('publisher_year');
                $song->publisher_name        = $this->request->input('publisher_name');

                if($this->request->input('created_at'))
                {
                    $song->created_at = Carbon::parse($this->request->input('created_at'));
                }

                if($this->request->input('additional-artist') != ''){
                    $i = 0;
                    DB::table('album_artist')
                    ->where('song_id',$this->request->input('id'))
                    ->delete();
                    foreach($this->request->input('additional-artist') as $name){
                        if($name != ''){
                            DB::table('album_artist')->insert([
                                'song_id' => $this->request->input('id'),
                                'artist_role' => $this->request->input('roles')[$i],
                                'artist_name' => $name,
                            ]);
                        }
                        $i++;
                    }
                }
                /*if(is_array($genre))
                {
                    $song->genre = implode(",", $this->request->input('genre'));
                } else {
                    $song->genre = null;
                }

                if(is_array($mood))
                {
                    $song->mood = implode(",", $this->request->input('mood'));
                } else {
                    $song->mood = null;
                }*/

                $tags = $this->request->input('tag');

                if(is_array($tags))
                {
                    $tags = implode(",", $tags);
                    DB::table('song_tags')->where('song_id', $song->id)->delete();

                    if( $tags ) {
                        $tags = explode( ",", $tags );
                        foreach ( $tags as $tag ) {
                            DB::table('song_tags')->insert([
                                'song_id' => $song->id,
                                'tag' => $tag
                            ]);
                        }
                    }
                }

                if($this->request->input('copyright'))
                {
                    $song->copyright = $this->request->input('copyright');
                } else {
                    $song->copyright = null;
                }

                if($this->request->input('description'))
                {
                    $song->description = $this->request->input('description');
                } else {
                    $song->description = null;
                }

                if($this->request->input('released_at'))
                {
                    $song->released_at =  Carbon::parse($this->request->input('released_at'));
                } else {
                    $song->released_at = null;
                }

                if(! $song->approved && Role::getValue('artist_mod')) {
                    $song->approved = 1;
                }

                if($this->request->input('visibility')) {
                    $song->visibility = 1;
                } else {
                    $song->visibility = 0;
                }

                if($this->request->input('comments')) {
                    $song->allow_comments = 1;
                } else {
                    $song->allow_comments = 0;
                }

                if($this->request->input('downloadable')) {
                    $song->allow_download = 1;
                } else {
                    $song->allow_download = 0;
                }

                if($this->request->input('explicit')) {
                    $song->explicit = 1;
                } else {
                    $song->explicit = 0;
                }

                if($this->request->input('selling')) {
                    $this->request->validate([
                        'price' => 'required|numeric|min:' . Role::getValue('monetization_song_min_price') . '|max:' . Role::getValue('monetization_song_max_price'),
                    ]);
                    $song->selling = 1;
                    $song->price = $this->request->input('price');
                } else {
                    $song->selling = 0;
                }

                if($this->request->input('notification')) {
                    if($this->request->input('created_at')) {
                        makeActivity(
                            auth()->user()->id,
                            auth()->user()->artist_id,
                            (new Artist)->getMorphClass(),
                            'addSong',
                            $song->id,
                            false,
                            Carbon::parse($this->request->input('created_at'))
                        );
                    } else {
                        makeActivity(
                            auth()->user()->id,
                            auth()->user()->artist_id,
                            (new Artist)->getMorphClass(),
                            'addSong',
                            $song->id
                        );
                    }
                }

                $song->copyright = $this->request->input('copyright');
                $song->save();

                return response()->json($song);
            }
        } else {
            abort(403, 'Not your song.');
        }
    }

    /**
     * Get Available Genres (set available genre in Admin panel user group and role)
     * @return array
     */

    public function genres()
    {
        $allowGenres = Genre::where('discover', 1)->get();

        $selectedGenres = array();

        if($this->request->input('object_type')) {

            if($this->request->input('object_type') == 'song') {
                $song = Song::withoutGlobalScopes()->findOrFail($this->request->input('id'));
                $selectedGenres = explode(',', $song->genre);
            } else if($this->request->input('object_type') == 'album') {
                if($this->request->input('id')) {
                    $song = Album::withoutGlobalScopes()->findOrFail($this->request->input('id'));
                    $selectedGenres = explode(',', $song->genre);
                } else {
                    $selectedGenres = [];
                }
            }

        }

        $allowGenres = $allowGenres->map(function($genre) use ($selectedGenres) {
            if( in_array($genre->id, $selectedGenres) ) $genre->selected = true;

            else $genre->selected = false;

            return $genre;
        });

        if($this->request->ajax()) {
            response()->json($allowGenres);
        }

        return $allowGenres;
    }

    /**
     * Get Available Moods (set available moods in Admin panel user group and role)
     * @return array
     */

    public function moods()
    {
        $allowMoods = Mood::all();

        $selectedMoods = array();

        if($this->request->input('object_type')) {

            if($this->request->input('object_type') == 'song') {
                $song = Song::withoutGlobalScopes()->findOrFail($this->request->input('id'));
                $selectedMoods = explode(',', $song->mood);
            } else if($this->request->input('object_type') == 'album') {

                if($this->request->input('id')) {
                    $song = Album::withoutGlobalScopes()->findOrFail($this->request->input('id'));
                    $selectedMoods = explode(',', $song->mood);
                } else {
                    $selectedMoods = [];
                }
            }

        }

        $allowMoods = $allowMoods->map(function($mood) use ($selectedMoods) {
            if( in_array($mood->id, $selectedMoods) ) $mood->selected = true;

            else $mood->selected = false;

            return $mood;
        });

        if($this->request->ajax()) {
            response()->json($allowMoods);
        }

        return $allowMoods;
    }

    public function categories()
    {
        if($this->request->ajax()) {
            response()->json(PodcastCategory::all());
        }

        return PodcastCategory::all();
    }

    public function countries()
    {
        $countries = Country::all();

        if($this->request->ajax()) {
            response()->json($countries);
        }

        return $countries;
    }

    public function languages()
    {
        $languages = CountryLanguage::where('country_code', $this->request->input('country_code'))->get();

        if($this->request->ajax()) {
            response()->json($languages);
        }

        return $languages;
    }

    public function artistChart()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);

        $fromDate = Carbon::now()->subDays(15)->format('Y/m/d H:i:s');
        $toDate = Carbon::now()->format('Y/m/d H:i:s');

        $rows = DB::table('popular')
            ->select(DB::raw('sum(plays) AS playSong'), DB::raw('sum(favorites) AS favoriteSong'),  DB::raw('sum(collections) AS collectSong'), DB::raw('DATE(created_at) as date'))
            ->where('popular.created_at', '<=',  $toDate)
            ->where('popular.created_at', '>=',  $fromDate)
            ->where('artist_id', $this->artist->id)
            ->groupBy('date')
            ->limit(50)
            ->get();

        $rows = insertMissingData($rows, ['playSong', 'favoriteSong', 'collectSong'], $fromDate, $toDate);

        $data = array();

        foreach ($rows as $item) {
            $item = (array) $item;
            $data['playSong'][] = $item['playSong'];
            $data['favoriteSong'][] = $item['favoriteSong'];
            $data['collectSong'][] = $item['collectSong'];
            $data['period'][] = Carbon::parse($item['date'])->format('m/d');
        }

        return response()->json(array(
            'success' => true,
            'data' => $data

        ));
    }

    public function songChart()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);

        $start_date = date ( "Y-m-d", (time() - (30*24*3600)) );
        $end_date = date ( "Y-m-d", time() );

        $from = strtotime( date("Y-m-d")) - (14 * 24 * 60 * 60);
        $from = date("Y-m-d", $from);

        $play_data = DB::table('popular')
            ->select(DB::raw('sum(plays) AS playSong'), DB::raw('sum(favorites) AS favoriteSong'),  DB::raw('sum(channels) AS collectSong'), 'created_at')
            ->where('popular.created_at', '<=',  date("Y-m-d"))
            ->where('popular.created_at', '>=',  $from)
            ->where('popular.song_id', $this->request->route('id'))
            //->groupBy('popular.trackId')
            ->groupBy('popular.created_at')
            ->limit(50)
            ->get();

        $data = insertMissingDate($play_data, "playSong", $from, date("Y-m-d"));

        return response()->json(array(
            'success' => true,
            'data' => $data

        ));
    }

    public function albums()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('albums', $this->artist->albums()->withoutGlobalScopes()->orderBy('inserted_at','desc')->paginate(20));

        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        $view = View::make('artist-management.albums')
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function release()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('albums', $this->artist->albums()->withoutGlobalScopes()->where('created_at', 'like', '%' . Date('Y-m-d') . '%')->paginate(20));

        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        $view = View::make('artist-management.release')
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function paid()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('albums', $this->artist->albums()->withoutGlobalScopes()->where('paid','1')->paginate(20));

        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        $view = View::make('artist-management.paid')
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function unpaid()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('albums', $this->artist->albums()->withoutGlobalScopes()->where('paid','0')->paginate(20));

        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        $view = View::make('artist-management.unpaid')
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }
    /**
     * Edited by Egova.
     * Date: 2022-08-17
     * Time: 12:17
     */
    public function createAlbum()
    {
        $this->request->validate([
            'title' => 'required|string|max:50',
            'type' => 'required|numeric|between:1,10',
            'primary-artist' => 'required|string|max:50',
            'label' => 'nullable|string|max:50',
            'composer' => 'required|string|max:50',
            'arranger' => 'required|string|max:50',
            'lyricist' => 'required|string|max:50',
            'description' => 'nullable|string|max:1000',
            'genre' => 'required|not_in:0',
            'display_artist' => 'required',
            'language' => 'required',
            'second_genre' => 'nullable',
            'group_genre' => 'required|not_in:0',
            'copyright' => 'nullable|string|max:100',
            'created_at' => 'required|date_format:m/d/Y|after:' . Carbon::now()->addDays($this->minDateRelease())->toDateString(),
            'released_at' => 'required|date_format:m/d/Y|before:' . Carbon::now(),
            'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096)
        ]);

        $album = new Album();

        $album->title               = $this->request->input('title');
        $album->artistIds           = auth()->user()->artist_id;
        $album->display_artist      = $this->request->input('display_artist');
        $album->genre               = $this->request->input('genre');
        $album->remix_version       = $this->request->input('remix_version');
        if($this->request->input('label') == ''){
            $album->label           = 'Aksara';
        }else{
            $album->label           = $this->request->input('label');
        }
        $album->second_genre        = $this->request->input('second_genre');
        $album->group_genre         = $this->request->input('group_genre');
        $mood                       = $this->request->input('mood');
        $album->type                = $this->request->input('type');
        $album->primary_artist      = $this->request->input('primary-artist');
        $album->composer            = $this->request->input('composer');
        $album->arranger            = $this->request->input('arranger');
        $album->lyricist            = $this->request->input('lyricist');
        $album->grid                = $this->request->input('grid-code');
        $album->language            = $this->request->input('language');
        $album->description         = $this->request->input('description');
        $album->price_category      = 'Premium';
        $album->copyright           = $this->request->input('copyright');
        $album->license_year        = $this->request->input('license_year');
        $album->license_name        = $this->request->input('license_name');
        $album->recording_year      = $this->request->input('recording_year');
        $album->recording_name      = $this->request->input('recording_name');
        $album->visibility          = $this->request->input('visibility');
        $album->user_id             = auth()->user()->id;

        if($this->request->input('released_at'))
        {
            $album->released_at = Carbon::parse($this->request->input('released_at'));
        }

        if($this->request->input('created_at'))
        {
            $album->created_at = Carbon::parse($this->request->input('created_at'));
        }

        /*if(is_array($genre))
        {
            $album->genre = implode(",", $this->request->input('genre'));
        }

        if(is_array($second_genre))
        {
            $album->second_genre = implode(",", $this->request->input('second_genre'));
        }
        
        if(is_array($group_genre))
        {
            $album->group_genre = implode(",", $this->request->input('group_genre'));
        }*/

        if(is_array($mood))
        {
            $album->mood = implode(",", $this->request->input('mood'));
        }

        if(Role::getValue('artist_mod')) {
            $album->approved = 1;
        }


        $album->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
            ->usingFileName(time(). '.jpg')
            ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));

        if($this->request->input('visibility')) {
            $album->visibility = 1;
        } else {
            $album->visibility = 0;
        }

        if($this->request->input('comments')) {
            $album->allow_comments = 1;
        } else {
            $album->allow_comments = 0;
        }

        if($this->request->input('selling')) {
            $this->request->validate([
                'price' => 'required|numeric|min:' . Role::getValue('monetization_album_min_price') . '|max:' . Role::getValue('monetization_album_max_price'),
            ]);
            $album->selling = 1;
            $album->price = $this->request->input('price');
        } else {
            $album->selling = 0;
        }
        
        if($this->request->input('upc') != ''){
            $album->upc = $this->request->input('upc');
        }
        if($this->request->input('ref') != ''){
            $album->ref = $this->request->input('ref');
        }
        $album->save();

        $trx_id = new_transaction();
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->album_id = $album->id;
        $transaction->transaction_id = $trx_id;
        $transaction->save();
            
        if($this->request->input('additional-artist') != ''){
            $i = 0;
            foreach($this->request->input('additional-artist') as $name){
                if($name != ''){
                    DB::table('album_artist')->insert([
                        'album_id' => $album->id,
                        'artist_role' => $this->request->input('roles')[$i],
                        'artist_name' => $name,
                    ]);
                }
                $i++;
            }
        }
        return $album->makeVisible(['approved',$album->id]);
    }


    public function showAlbum()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $album = Album::withoutGlobalScopes()->findOrFail($this->request->route('id'));
        $album->makeVisible(['description']);
        $album->setRelation('songs', $album->songs()->withoutGlobalScopes()->get());
        $artist_roles = DB::table('album_artist')->where('album_id', $this->request->route('id'))->get();
        $artists = Artist::where('user_id', auth()->user()->id)->get();
        $patners = Patner::withoutGlobalScopes()->get();
        $my_artist = array();
        foreach($artists as $ar){
            array_push($my_artist,$ar['name']);
        }
        foreach ($album->songs as $s) {
            $song_roles = DB::table('album_artist')
            ->where('song_id',$s->id)
            ->get();
            $s->roles_song = $song_roles;
        }
        $transaction = Transaction::withoutGlobalScopes()->where('album_id', $album->id)->first();
        if(isset($album->free_song)){
            $transaction->free_song_id = $album->free_song->id;
            $transaction->nilai_free_song = $album->free_song->free*$album->price->harga_discount;
            $transaction->save();
        }else{
            if($transaction->free_song_id != NULL)
            {
                $transaction->free_song_id = NULL;
                $transaction->nilai_free_song = NULL;
                $transaction->save();
            }
        }
        $view = View::make('artist-management.edit-album')
            ->with('artist', $this->artist)
            ->with('my_artist', $my_artist)
            ->with('patners', $patners)
            ->with('transaction', $transaction)
            ->with('artist_roles', $artist_roles)
            ->with('album', $album);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function removeVoucher(){
        if(Transaction::withoutGlobalScopes()->where('id', '=', $this->request->input('id'))->exists()) {
            $transaction = Transaction::withoutGlobalScopes()->where('id', '=', $this->request->input('id'))->firstOrFail();
            if(Payment::withoutGlobalScopes()->where('transaction_id', '=' , $transaction->transaction_id)->exists()){
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.COUPON_USED')))
                ], 403);
            }else{
                $voucher =  Voucher::where('id', $transaction->voucher_id)->first();
                $transaction->nilai_voucher = 0;
                $transaction->voucher_id = NULL;
                $transaction->save();
                $voucher->use_count = $voucher->use_count-1;
                $voucher->save();
                return response()->json(array('success' => true));
            }
        } else {
            abort(403, 'Not your voucher.');
        }
    }
    public function applyVoucher(){
        $this->request->validate([
            'id'   => 'required',
            'code' => 'required|string',
        ]);

        $transaction = Transaction::where('album_id', $this->request->input('id'))->first();
        $voucher = Voucher::where('code', $this->request->input('code'))->first();

        if(isset($voucher->id)) {
            if($voucher->expired_at && $voucher->expired_at < Carbon::now()) {
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.COUPON_EXPIRED')))
                ], 403);
            }

            if($voucher->usage_limit && $voucher->use_count > $voucher->usage_limit) {
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.COUPON_LIMITED')))
                ], 403);
            }

            if($voucher->minimum_spend && $voucher->minimum_spend > $transaction->amount) {
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.COUPON_MINIMUM_ERROR', ['amount' => $voucher->minimum_spend . config('settings.currency', 'USD')])))
                ], 403);
            }

            if($voucher->maximum_spend && $voucher->maximum_spend < $transaction->amount) {
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.COUPON_MAXIMUM_ERROR', ['amount' => $voucher->maximum_spend . config('settings.currency', 'USD')])))
                ], 403);
            }

            $transaction->voucher_id = $voucher->id;
            if($voucher->type == 'percentage'){
                $nilai_voucher = $transaction->amount*$voucher->amount/100;
            }else{
                $nilai_voucher = $voucher->amount > $transaction->amount ? $transaction->amount : $voucher->amount;
            }
            $transaction->nilai_voucher = $nilai_voucher;
            $transaction->save();
            $voucher->use_count = $voucher->use_count+1;
            $voucher->save();
            return response()->json(array('success' => true));
        } else {
            return response()->json([
                'message' => 'failed',
                'errors' => array('message' => array(__('web.COUPON_NOT_EXIST')))
            ], 403);
        }
    }

    public function deleteAlbum()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        if(Album::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $album = Album::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if(intval(Role::getValue('artist_day_edit_limit')) != 0 && Carbon::parse($album->created_at)->addDay(Role::getValue('artist_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_DELETE_ALBUM_DENIED')))
                ], 403);
            } else {
                $album->delete();
                return response()->json(array('success' => true));
            }
        } else {
            abort(403, 'Not your album.');
        }
    }

    public function deleteSong()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        if(Song::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $song = Song::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if(intval(Role::getValue('artist_day_edit_limit')) != 0 && Carbon::parse($song->created_at)->addDay(Role::getValue('artist_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_DELETE_SONG_DENIED')))
                ], 403);
            } else {
                $song->delete();
                return response()->json(array('success' => true));
            }
        } else {
            abort(403, 'Not your song.');
        }
    }

    public function deletePodcast()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        if(Podcast::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $podcast = Podcast::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if(intval(Role::getValue('artist_podcast_day_edit_limit')) != 0 && Carbon::parse($podcast->created_at)->addDay(Role::getValue('artist_podcast_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_DELETE_PODCAST_DENIED')))
                ], 403);
            } else {
                $podcast->delete();
                return response()->json(array('success' => true));
            }
        } else {
            abort(403, 'Not your podcast.');
        }
    }


    public function sortAlbumSongs()
    {
        $this->request->validate([
            'album_id' => 'required|int',
            'removeIds' => 'nullable|string',
            'nextOrder' => 'required|string',
        ]);

        $album_id = $this->request->input('album_id');
        $removeIds = json_decode($this->request->input('removeIds'));
        $nextOrder = json_decode($this->request->input('nextOrder'));

        if(is_array($removeIds))
        {
            foreach ($removeIds as $trackId){
                DB::table('album_songs')
                    ->where('album_id', $album_id)
                    ->where('song_id', $trackId)
                    ->delete();
            }
        }

        if(is_array($nextOrder))
        {
            foreach ($nextOrder as $index => $trackId) {
                DB::table('album_songs')
                    ->where('album_id', $album_id)
                    ->where('song_id', $trackId)
                    ->update(['priority' => $index]);
            }
        }

        return response()->json(array("success" => true));
    }
    private function minDateRelease(){
        $day = Carbon::parse(Carbon::now())->format('l');
        if($day == 'Friday' && $day == 'Saturday'){
            return 8;
        }else{
            return 7;
        }
    }

    public function statusTransaction()
    {
        $transaction = Transaction::withoutGlobalScopes()->where('transaction_id', $this->request->route('id'))->first();
        return response()->json($transaction);
    }

    public function editPatner()
    {
        $this->request->validate([
            'patner_all' => 'nullable|numeric',
            'patner'     => 'required_without:patner_all',
        ]);

        if(Album::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $album = Album::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if(Carbon::parse($album->created_at) > Carbon::now()->addDays($this->minDateRelease())->toDateString()){
                $patner = $this->request->input('patner');
                if($patner != null){
                    if(is_array($patner))
                    {
                        $album->patner = implode(",", $this->request->input('patner'));
                    } else {
                        $album->patner = null;
                    }
                }else{
                    $patners = Patner::withoutGlobalScopes()->get();
                    $my_patner = array();
                    foreach($patners as $p){
                        array_push($my_patner, $p->id);
                    }
                    if(count($my_patner) > 0)
                    {
                        $album->patner = implode(",", $my_patner);
                    } else {
                        $album->patner = null;
                    }
                }
                $album->save();
                $token_youtap = token_youtap();
                $timestamp = date('YMdHis');
                $amount = $album->price->harga_discount*$album->song_count;
                if(Transaction::withoutGlobalScopes()->where('album_id', '=', $album->id)->exists()) {
                    $transaction = Transaction::withoutGlobalScopes()->where('album_id', '=', $album->id)->firstOrFail();
                    $transaction->amount = $amount;
                    $transaction->save();
                    $trx_id = $transaction->transaction_id;
                }else{
                    $trx_id = new_transaction();
                    $transaction = new Transaction();
                    $transaction->user_id = auth()->user()->id;
                    $transaction->album_id = $album->id;
                    $transaction->transaction_id = $trx_id;
                    $transaction->amount = $amount;
                    $transaction->save();
                }
                $merchant_bill_ref = ($timestamp . $trx_id);
                $amount_payment = $amount - $transaction->nilai_voucher - $transaction->nilai_free_song;
                $res_signature = signature_youtap($trx_id, $amount_payment, $timestamp, $merchant_bill_ref);
                $signature = $res_signature['signature'];
                $minify_body = $res_signature['minify_body'];
                if($amount_payment > 0){
                    $res_qr = qris_youtap($timestamp, $signature, $token_youtap, $minify_body);
                        
                    $payment = new Payment();
                    $payment->transaction_id = $trx_id;
                    $payment->merchant_bill_ref = $merchant_bill_ref;
                    $payment->minify_body = $minify_body;
                    $payment->signature = $signature;
                    $payment->amount = $amount_payment;
                    $payment->open_bill_id = $res_qr['open_bill_id'];
                    $payment->bill_status = $res_qr['bill_status'];
                    $payment->save();
                    $url_qr = (new QRCode)->render($res_qr['merchant_qr_code']);
                    return response()->json([
                        'image' => $url_qr,
                        'trx_id' => $trx_id
                    ]);
                }else{
                    $album->paid = 1;
                    $album->save();
                    $transaction->status = 1;
                    $transaction->save();
                    $payment = new Payment();
                    $payment->transaction_id = $trx_id;
                    $payment->merchant_bill_ref = $merchant_bill_ref;
                    $payment->minify_body = $minify_body;
                    $payment->signature = $signature;
                    $payment->amount = $amount_payment;
                    $payment->open_bill_id = '';
                    $payment->bill_status = 'Paid';
                    $payment->save();
                    return response()->json('');
                }
            }else{
                return response()->json([
                    'message' => 'failed',
                    'errors' => array('message' => array(__('web.DATE_PUBLISH_FAILED').Carbon::now()->addDays($this->minDateRelease())->toDateString()))
                ], 403);
            }
        }else {
            abort(403, 'Not your album.');
        }
    }
    public function editAlbum()
    {
        $this->request->validate([
            'title' => 'required|string|max:50',
            'type' => 'required|numeric|between:1,10',
            'description' => 'nullable|string|max:1000',
            'copyright' => 'nullable|string|max:100',
            'genre' => 'required',
            'label' => 'nullable|string|max:50',
            'display_artist' => 'required',
            'primary-artist' => 'required|string|max:50',
            'composer' => 'required|string|max:50',
            'arranger' => 'required|string|max:50',
            'lyricist' => 'required|string|max:50',
            'second_genre' => 'nullable',
            'group_genre' => 'required',
        ]);

        if(Album::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $album = Album::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if($album->paid == 0){
                $this->request->validate([
                    'created_at' => 'required|date_format:m/d/Y|after:' . Carbon::now()->addDays($this->minDateRelease())->toDateString(),
                    'released_at' => 'required|date_format:m/d/Y|before:' . Carbon::now(),
                ]);
            }
            if($album->type != $this->request->input('type')) {
                $album_type = AlbumType::findOrFail($this->request->input('type'));
                if($album->song_count > $album_type->max){
                    return response()->json([
                        'message' => 'Your song exceeds the limit for this album type',
                        'errors' => array('message' => array(__('web.POPUP_EDIT_ALBUM_FAILED')))
                    ], 403);
                }
            } 
            if(intval(Role::getValue('artist_day_edit_limit')) != 0 && Carbon::parse($album->created_at)->addDay(Role::getValue('artist_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_EDIT_ALBUM_DENIED')))
                ], 403);
            } else {
                if ($this->request->hasFile('artwork'))
                {
                    $this->request->validate([
                        'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096)
                    ]);

                    $album->clearMediaCollection('artwork');
                    $album->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                        ->usingFileName(time(). '.jpg')
                        ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
                }

                $album->title = $this->request->input('title');
                $album->description = $this->request->input('description');
                $album->visibility = $this->request->input('visibility');
                $album->genre = $this->request->input('genre');
                $album->remix_version       = $this->request->input('remix_version');
                $album->group_genre = $this->request->input('group_genre');
                $album->label               = $this->request->input('label');
                $album->second_genre = $this->request->input('second_genre');
                $mood = $this->request->input('mood');
                $album->primary_artist      = $this->request->input('primary-artist');
                $album->composer            = $this->request->input('composer');
                $album->arranger            = $this->request->input('arranger');
                $album->lyricist            = $this->request->input('lyricist');
                $album->type = $this->request->input('type');
                $album->description = $this->request->input('description');
                $album->copyright = $this->request->input('copyright');
                $album->display_artist = $this->request->input('display_artist');
                $album->license_year        = $this->request->input('license_year');
                $album->license_name        = $this->request->input('license_name');
                $album->recording_year      = $this->request->input('recording_year');
                $album->recording_name      = $this->request->input('recording_name');
                $album->grid                = $this->request->input('grid-code');
                $album->language            = $this->request->input('language');
                /*$album->price_category            = $this->request->input('price_category');*/

                if($this->request->input('upc') != ''){
                    $album->upc = $this->request->input('upc');
                }
                if($this->request->input('ref') != ''){
                    $album->ref = $this->request->input('ref');
                }

                /*if(is_array($genre))
                {
                    $album->genre = implode(",", $this->request->input('genre'));
                } else {
                    $album->genre = null;
                }

                if(is_array($group_genre))
                {
                    $album->group_genre = implode(",", $this->request->input('group_genre'));
                } else {
                    $album->group_genre = null;
                }

                if(is_array($second_genre))
                {
                    $album->second_genre = implode(",", $this->request->input('second_genre'));
                } else {
                    $album->second_genre = null;
                }*/

                if(is_array($mood))
                {
                    $album->mood = implode(",", $this->request->input('mood'));
                } else {
                    $album->mood = null;
                }

                if($this->request->input('visibility')) {
                    $album->visibility = 1;
                } else {
                    $album->visibility = 0;
                }

                if($this->request->input('comments')) {
                    $album->allow_comments = 1;
                } else {
                    $album->allow_comments = 0;
                }

                if($this->request->input('selling')) {
                    $this->request->validate([
                        'price' => 'required|numeric|min:' . Role::getValue('monetization_album_min_price') . '|max:' . Role::getValue('monetization_album_max_price'),
                    ]);
                    $album->selling = 1;
                    $album->price = $this->request->input('price');
                } else {
                    $album->selling = 0;
                }

                if($this->request->input('released_at'))
                {
                    $album->released_at = Carbon::parse($this->request->input('released_at'));
                }
        
                if($this->request->input('created_at'))
                {
                    $album->created_at = Carbon::parse($this->request->input('created_at'));
                }
                $album->save();
                DB::table('album_artist')
                ->where('album_id',$this->request->input('id'))
                ->delete();
                if($this->request->input('additional-artist') != ''){
                    $i = 0;
                    foreach($this->request->input('additional-artist') as $name){
                        if($name != ''){
                            DB::table('album_artist')->insert([
                                'album_id' => $album->id,
                                'artist_role' => $this->request->input('roles')[$i],
                                'artist_name' => $name,
                            ]);
                        }
                      $i++;
                    }
                }
                return response()->json($album);
            }
        } else {
            abort(403, 'Not your album.');
        }
    }

    public function uploadAlbum()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $album = Album::withoutGlobalScopes()->findOrFail($this->request->route('id'));
        $allowGenres = Genre::where('discover', 1)->get();
        $allowMoods = Mood::all();

        $view = View::make('artist-management.upload')
            ->with('artist', $this->artist)
            ->with('album', $album)
            ->with('allowGenres', $allowGenres)
            ->with('allowMoods', $allowMoods);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function handleUpload()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $album = Album::withoutGlobalScopes()->findOrFail($this->request->route('id'));

        /** Check if user have permission to upload */

        if(! Role::getValue('artist_allow_upload')) {
            abort(403);
        }

        $res = (new Upload)->handle($this->request, $artistIds = auth()->user()->artist_id,$album_id = $album->id);
        $res->album = $album;
        $res->artist_roles = DB::table('album_artist')->where('album_id', $this->request->route('id'))->get();
        return response()->json($res);
    }

    public function podcasts()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $this->artist->setRelation('podcasts', $this->artist->podcasts()->withoutGlobalScopes()->paginate(20));

        $view = View::make('artist-management.podcasts')
            ->with('artist', $this->artist);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function importPodcast()
    {
        $this->request->validate([
            'rss_url' => 'required|string',
            'country' => 'required|string|max:3',
            'language' => 'required|int',
            'created_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
        ]);

        $podcast = new Podcast();
        @libxml_use_internal_errors(true);
        $rss = @simplexml_load_file($this->request->input('rss_url'));

        if (false === $rss) {
            return response()->json([
                'message' => 'error',
                'errors' => array('message' => array('Can not fetch the rss.'))
            ], 403);
        }

        if (isset($rss->channel)) {
            $podcast->artist_id = auth()->user()->artist_id;
            $podcast->title = strip_tags($rss->channel->title);
            $podcast->description = strip_tags($rss->channel->description);
            $podcast->rss_feed_url = $this->request->input('rss_url');
            $podcast->country_code = $this->request->input('country');
            $podcast->language_id = $this->request->input('language');
            $podcast->user_id = auth()->user()->id;

            $podcast->addMediaFromUrl(reset($rss->channel->image->url))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
            $podcast->created_at = Carbon::parse($rss->channel->pubDate);
            $podcast->updated_at = Carbon::parse($rss->channel->lastBuildDate);
            $podcast->save();
        } else {
            return response()->json([
                'message' => 'error',
                'errors' => array('message' => array('RSS format does not match a podcast feed.'))
            ], 403);
        }

        if (isset($rss->channel->item)) {
            foreach ($rss->channel->item as $item) {
                if (!Episode::where('created_at', Carbon::parse($item->pubDate))->where('podcast_id', $podcast->id)->exists()) {
                    $episode = new Episode();
                    $episode->podcast_id = $podcast->id;
                    $episode->title = strip_tags($item->title);
                    $episode->description = strip_tags($item->description);
                    $episode->created_at = Carbon::parse($item->pubDate);
                    $episode->type = $item->enclosure['type'];
                    $episode->stream_url = $item->enclosure['url'];
                    $itunes = $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
                    $episode->type = 1;
                    $episode->duration = detectTimeFormat(reset($itunes->duration)) ? timeToSec(reset($itunes->duration)) : intval(reset($itunes->duration));
                    $episode->explicit = (reset($itunes->explicit) == 'clean' || reset($itunes->explicit) == 'no' ) ? 0 : 1;
                    $episode->save();
                }
            }
        }

        return response()->json($podcast);
    }

    public function createPodcast()
    {
        if(! Role::getValue('artist_allow_podcast')) {
            abort(403, 'No permission!');
        }

        $this->request->validate([
            'title' => 'required|string|max:50',
            'category' => 'required|array',
            'description' => 'nullable|string|max:1000',
            'created_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
            'released_at' => 'nullable|date_format:m/d/Y|before:' . Carbon::now(),
            'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096),
            'language_id' => 'nullable|numeric',
            'country_code' => 'nullable|string|max:3',
        ]);

        $podcast = new Podcast();

        $podcast->title = $this->request->input('title');
        $podcast->country_code = $this->request->input('country');
        $podcast->language_id = $this->request->input('language_id');
        $podcast->artist_id = auth()->user()->artist_id;
        $category = $this->request->input('category');
        $podcast->description = $this->request->input('description');

        $this->request->input('visibility') ? $podcast->visibility = 1 : $podcast->visibility = 0;
        $this->request->input('allow_comments') ? $podcast->allow_comments = 1 : $podcast->allow_comments = 0;
        $this->request->input('allow_download') ? $podcast->allow_download = 1 : $podcast->allow_download = 0;
        $this->request->input('explicit') ? $podcast->explicit = 1 : $podcast->explicit = 0;

        $podcast->user_id = auth()->user()->id;

        if($this->request->input('created_at'))
        {
            $podcast->created_at = Carbon::parse($this->request->input('created_at'));
        }

        if(is_array($category))
        {
            $podcast->category = implode(",", $category);
        }

        if(Role::getValue('artist_podcast_mod')) {
            $podcast->approved = 1;
        }

        $podcast->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
            ->usingFileName(time(). '.jpg')
            ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));

        if($this->request->input('visibility')) {
            $podcast->visibility = 1;
        } else {
            $podcast->visibility = 0;
        }

        $podcast->save();

        return $podcast->makeVisible(['approved']);
    }


    public function editPodcast()
    {
        $this->request->validate([
            'title' => 'required|string|max:50',
            'category' => 'required|array',
            'description' => 'nullable|string|max:1000',
            'created_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
            'released_at' => 'nullable|date_format:m/d/Y|before:' . Carbon::now(),
            'language_id' => 'nullable|numeric',
            'country_code' => 'nullable|string|max:3',
        ]);

        $podcast = Podcast::findOrFail($this->request->input('id'));
        $podcast->title = $this->request->input('title');
        $podcast->country_code = $this->request->input('country');
        $podcast->language_id = $this->request->input('language');

        $category = $this->request->input('category');
        $podcast->description = $this->request->input('description');

        $this->request->input('visibility') ? $podcast->visibility = 1 : $podcast->visibility = 0;
        $this->request->input('allow_comments') ? $podcast->allow_comments = 1 : $podcast->allow_comments = 0;
        $this->request->input('allow_download') ? $podcast->allow_download = 1 : $podcast->allow_download = 0;
        $this->request->input('explicit') ? $podcast->explicit = 1 : $podcast->explicit = 0;

        $podcast->user_id = auth()->user()->id;

        if($this->request->input('created_at'))
        {
            $podcast->created_at = Carbon::parse($this->request->input('created_at'));
        }

        if(is_array($category))
        {
            $podcast->category = implode(",", $category);
        }

        if(Role::getValue('artist_podcast_mod')) {
            $podcast->approved = 1;
        }

        if($this->request->file('artwork')) {
            $this->request->validate([
                'artwork' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . config('settings.max_image_file_size', 8096)
            ]);
            $podcast->clearMediaCollection('artwork');
            $podcast->addMediaFromBase64(base64_encode(Image::make($this->request->file('artwork'))->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));
        }

        if($this->request->input('visibility')) {
            $podcast->visibility = 1;
        } else {
            $podcast->visibility = 0;
        }

        $podcast->save();

        return $podcast->makeVisible(['approved']);
    }

    public function showPodcast()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $podcast = Podcast::withoutGlobalScopes()->findOrFail($this->request->route('id'));
        $podcast->setRelation('episodes', $podcast->episodes()->with('podcast')->withoutGlobalScopes()->paginate(20));

        $view = View::make('artist-management.edit-podcast')
            ->with('artist', $this->artist)
            ->with('podcast', $podcast);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function uploadPodcast()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $podcast = Podcast::withoutGlobalScopes()->findOrFail($this->request->route('id'));

        $view = View::make('artist-management.podcast-upload')
            ->with('artist', $this->artist)
            ->with('podcast', $podcast);

        if($this->request->ajax()) {
            $sections = $view->renderSections();
            return $sections['content'];
        }

        return $view;
    }

    public function handlePodcastUpload()
    {
        $this->artist = Artist::findOrFail(auth()->user()->artist_id);
        $podcast = Podcast::withoutGlobalScopes()->findOrFail($this->request->route('id'));

        /** Check if user have permission to upload */

        if(! Role::getValue('artist_allow_upload')) {
            abort(403);
        }

        $res = (new Upload)->handleEpisode($this->request, $podcast->id);

        return response()->json($res);
    }

    public function editEpisode()
    {
        $this->request->validate([
            'id' => 'required|numeric',
            'title' => 'required|max:100',
            'description' => 'nullable|string',
            'season' => 'nullable|numeric',
            'number' => 'nullable|numeric',
            'type' => 'nullable|numeric:in:1,2,3',
            'created_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
        ]);

        if(Episode::withoutGlobalScopes()->where('user_id', '=', auth()->user()->id)->where('id', '=', $this->request->input('id'))->exists()) {
            $episode = Episode::withoutGlobalScopes()->findOrFail($this->request->input('id'));
            if(intval(Role::getValue('artist_day_edit_limit')) != 0 && Carbon::parse($episode->created_at)->addDay(Role::getValue('artist_day_edit_limit'))->lt(Carbon::now())) {
                return response()->json([
                    'message' => 'React the limited time to edit',
                    'errors' => array('message' => array(__('web.POPUP_EDIT_SONG_DENIED')))
                ], 403);
            } else {

                $episode->title = $this->request->input('title');
                $episode->description = $this->request->input('description');
                $episode->season = $this->request->input('season');
                $episode->number = $this->request->input('number');
                $episode->type = $this->request->input('type');

                if($this->request->input('created_at'))
                {
                    $episode->created_at = Carbon::parse($this->request->input('created_at'));
                }

                if($episode->podcast->catetory && Role::getValue('artist_podcast_mod')) {
                    if(Role::getValue('artist_trusted_genre')) {
                        $trustedSection = is_array(Role::getValue('artist_podcast_trusted_categories')) ? Role::getValue('artist_podcast_trusted_categories') : array();
                        if(!array_diff(explode(',', $episode->podcast->catetory), $trustedSection)) {
                            $episode->approved = 1;
                        } else {
                            $episode->approved = 0;
                        }
                    }
                }

                if($this->request->input('visibility')) {
                    $episode->visibility = 1;
                } else {
                    $episode->visibility = 0;
                }

                if($this->request->input('downloadable')) {
                    $episode->allow_download = 1;
                } else {
                    $episode->allow_download = 0;
                }

                if($this->request->input('explicit')) {
                    $episode->explicit = 1;
                } else {
                    $episode->explicit = 0;
                }

                if($this->request->input('allow_comments')) {
                    $episode->allow_comments = 1;
                } else {
                    $episode->allow_comments = 0;
                }

                if($this->request->input('notification')) {
                    if($this->request->input('created_at')) {
                        makeActivity(
                            auth()->user()->id,
                            auth()->user()->artist_id,
                            (new Artist)->getMorphClass(),
                            'addEpisode',
                            $episode->id,
                            false,
                            Carbon::parse($this->request->input('created_at'))
                        );
                    } else {
                        makeActivity(
                            auth()->user()->id,
                            auth()->user()->artist_id,
                            (new Artist)->getMorphClass(),
                            'addEpisode',
                            $episode->id
                        );
                    }
                }

                $episode->save();

                return response()->json($episode);
            }
        } else {
            abort(403, 'Not your episode.');
        }
    }

    public function createEvent()
    {
        $this->request->validate([
            'title' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'link' => 'nullable|string|max:100',
            'started_at' => 'nullable|date_format:m/d/Y|after:' . Carbon::now(),
        ]);

        $event = new Event();
        $event->artist_id = auth()->user()->artist_id;
        $event->title = $this->request->input('title');
        $event->location = $this->request->input('location');
        $event->link = $this->request->input('link');
        $event->started_at = Carbon::parse($this->request->input('started_at'));
        $event->save();

        makeActivity(
            auth()->user()->id,
            auth()->user()->artist_id,
            (new Artist)->getMorphClass(),
            'addEvent',
            $event->id,
            false
        );

        return response()->json($event);
    }

    public function editEvent()
    {
        $this->request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'link' => 'nullable|string|max:100',
            'started_at' => 'nullable|date_format:m/d/Y',
        ]);

        $event = Event::where('artist_id', auth()->user()->artist_id)
            ->where('id', $this->request->input('id'))
            ->firstOrFail();

        $event->title = $this->request->input('title');
        $event->location = $this->request->input('location');
        $event->link = $this->request->input('link');
        $event->started_at = Carbon::parse($this->request->input('started_at'));
        $event->save();

        return response()->json($event);
    }

    public function deleteEvent()
    {
        $this->request->validate([
            'id' => 'required|integer',
        ]);

        $event = Event::where('artist_id', auth()->user()->artist_id)
            ->where('id', $this->request->input('id'))
            ->firstOrFail();

        Activity::where('user_id', auth()->user()->id)
            ->where('activityable_id', auth()->user()->artist_id)
            ->where('activityable_type', 'App\Models\Artist')
            ->where('action', 'addEvent')
            ->delete();

        $event->delete();

        return response()->json(array(
            'success' => true
        ));
    }
}
