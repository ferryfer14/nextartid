<?php

namespace App\Imports;

use App\Models\Album;
use App\Models\AlbumArtist;
use App\Models\AlbumType;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Royalti;
use App\Models\Song;
use App\Models\Transaction;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SongImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private function roles(){
        $my_artist=array();
        array_push($my_artist,'primary');
        array_push($my_artist,'performer');
        array_push($my_artist,'producer');
        array_push($my_artist,'remixer');
        array_push($my_artist,'composer');
        array_push($my_artist,'lyricist');
        array_push($my_artist,'publisher');
        array_push($my_artist,'featuring');
        array_push($my_artist,'with');
        array_push($my_artist,'featuring');
        array_push($my_artist,'arranger');
        return $my_artist;
    }
    public function model(array $row)
    {
        $user = User::withoutGlobalScopes()->where('email','=',$row['email'])->first();
        if(isset($user)){
            $display_artist = Artist::withoutGlobalScopes()->where('name','=',$row['primary_artist'])->where('user_id','=',$user->id)->first();
            $album = Album::withoutGlobalScopes()->where('user_id','=',$user->id)->where('primary_artist','=',$row['album_display_artist'])->where('title','=',$row['album_title'])->first();
            $genre = Genre::withoutGlobalScopes()->where('name','=',$row['primary_genre'])->first();
            $secondary_genre = Genre::withoutGlobalScopes()->where('name','=',$row['secondary_genre'])->first();
            if(isset($display_artist) && isset($album) && $row['isrc'] != '' && !Song::withoutGlobalScopes()->where('isrc', $row['isrc'])->exists()) {
                /*$tmp = explode('.', $row['audio_url']);
                $lastElement = end($tmp);
                $tmp_name = explode('/', $row['audio_url']);
                $original_name = end($tmp_name);
                $init_file = 'storage/file.'.$lastElement;
                $path = public_path('storage/file.'.$lastElement);
                $file = file_get_contents($row['audio_url']);
                file_put_contents($path, $file);

                $mimeType = mime_content_type($path);
                $size = filesize ($path);

                $files =  new UploadedFile(base_path('public/'.$init_file), $original_name, $mimeType, null, true);
                $request = new Request();
                $request->headers->set('content-type', 'application/json');  
                $request->initialize(['yourParam' => 2],[],[],[],['file' => $files]);  
                
                $res = (new Upload)->handle($request, $user->artist_id, $album->id);
                if(isset($res)){*/
                    //$song = Song::withoutGlobalScopes()->findOrFail($res->id);
                    $song = new Song();
                    /*if(isset($song))
                    {*/
                        /*$song->clearMediaCollection('artwork');
                        $song->addMediaFromBase64(base64_encode(Image::make($row['cover_img'])->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                            ->usingFileName(time(). '.jpg')
                            ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));*/
                        $song->type_song = $album->type;
                        $song->title               = $row['title'];
                        $song->display_artist      = $display_artist->id;
                        $song->user_id      = $user->id;
                        $song->artistIds      = $user->artist_id;
                        $song->primary_artist      = $row['primary_artist'];
                        $song->remix_version            = $row['remix_version'];
                        $song->composer            = $row['composer'];
                        $song->arranger            = $row['arranger'];
                        $song->lyricist            = $row['lyricist'];
                        $song->label               = $row['label'];
                        $song->isrc               = $row['isrc'];
                        $song->iswc               = $row['iswc'];
                        $song->genre               = $genre->id;
                        $song->second_genre        = $secondary_genre->id;
                        $song->language            = $row['language'];
                        $song->lirik                = $row['lirik'];
                        $song->start_point                = $row['start_point'];
                        $song->explicit                = $row['explicit_lyrics'];
                        $song->separately                = 0;
                        $song->publisher_year        = $row['publish_year'];
                        $song->publisher_name        = $row['publish_name'];
                        $song->visibility = 1;
                        $song->approved = 1;
                        $song->allow_comments = 1;
                        $song->allow_download = 1;
                        $song->copyright = $row['copyright'];
                        $song->save();

                        $my_artist=array();
                        array_push($my_artist,'primary');
                        array_push($my_artist,'performer');
                        array_push($my_artist,'producer');
                        array_push($my_artist,'remixer');
                        array_push($my_artist,'composer');
                        array_push($my_artist,'lyricist');
                        array_push($my_artist,'publisher');
                        array_push($my_artist,'featuring');
                        array_push($my_artist,'with');
                        array_push($my_artist,'featuring');
                        array_push($my_artist,'arranger');

                        DB::table('album_songs')->insert(
                            [ 'song_id' => $song->id, 'album_id' => $album->id ]
                        );
                
                        if(isset($row['participant'])){
                            $participant = explode(";",$row['participant']);
                            for($i=0;$i<count($participant);$i++)
                            {
                                $role = explode(":",$participant[$i]);
                                DB::table('album_artist')->insert([
                                    'song_id' => $song->id,
                                    'artist_role' => array_search($role[0], $my_artist)+1,
                                    'artist_name' => $role[1],
                                ]);
                            }
                        }
                    //}
                //}
                return $album;
            }else if (isset($display_artist) && isset($album) && $row['isrc'] == '')
            {
                /*$tmp = explode('.', $row['audio_url']);
                $lastElement = end($tmp);
                $tmp_name = explode('/', $row['audio_url']);
                $original_name = end($tmp_name);
                $init_file = 'storage/file.'.$lastElement;
                $path = public_path('storage/file.'.$lastElement);
                $file = file_get_contents($row['audio_url']);
                file_put_contents($path, $file);

                $mimeType = mime_content_type($path);
                $size = filesize ($path);

                $files =  new UploadedFile(base_path('public/'.$init_file), $original_name, $mimeType, null, true);
                $request = new Request();
                $request->headers->set('content-type', 'application/json');  
                $request->initialize(['yourParam' => 2],[],[],[],['file' => $files]);  
                
                $res = (new Upload)->handle($request, $user->artist_id, $album->id);
                if(isset($res)){*/
                    //$song = Song::withoutGlobalScopes()->findOrFail($res->id);
                    $song = new Song();
                    /*if(isset($song))
                    {*/
                        /*$song->clearMediaCollection('artwork');
                        $song->addMediaFromBase64(base64_encode(Image::make($row['cover_img'])->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                            ->usingFileName(time(). '.jpg')
                            ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));*/
                        $song->type_song = $album->type;
                        $song->title               = $row['title'];
                        $song->display_artist      = $display_artist->id;
                        $song->user_id      = $user->id;
                        $song->artistIds      = $user->artist_id;
                        $song->primary_artist      = $row['primary_artist'];
                        $song->remix_version            = $row['remix_version'];
                        $song->composer            = $row['composer'];
                        $song->arranger            = $row['arranger'];
                        $song->lyricist            = $row['lyricist'];
                        $song->label               = $row['label'];
                        $song->isrc               = $row['isrc'];
                        $song->iswc               = $row['iswc'];
                        $song->genre               = $genre->id;
                        $song->second_genre        = $secondary_genre->id;
                        $song->language            = $row['language'];
                        $song->lirik                = $row['lirik'];
                        $song->start_point                = $row['start_point'];
                        $song->explicit                = $row['explicit_lyrics'];
                        $song->separately                = 0;
                        $song->publisher_year        = $row['publish_year'];
                        $song->publisher_name        = $row['publish_name'];
                        $song->visibility = 1;
                        $song->approved = 1;
                        $song->allow_comments = 1;
                        $song->allow_download = 1;
                        $song->copyright = $row['copyright'];
                        $song->save();
                        
                        DB::table('album_songs')->insert(
                            [ 'song_id' => $song->id, 'album_id' => $album->id ]
                        );
                
                        if(isset($row['participant'])){
                            $participant = explode(";",$row['participant']);
                            for($i=0;$i<count($participant);$i++)
                            {
                                $role = explode(":",$participant[$i]);
                                DB::table('album_artist')->insert([
                                    'song_id' => $song->id,
                                    'artist_role' => array_search($role[0], $my_artist)+1,
                                    'artist_name' => $role[1],
                                ]);
                            }
                        }
                    //}
                //}
                return $album;
            }
        }
    }
}
