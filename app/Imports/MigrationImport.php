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
use App\Models\User;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MigrationImport implements ToModel, WithHeadingRow
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
            $album_type = AlbumType::withoutGlobalScopes()->where('name','=',$row['type'])->first();
            $genre = Genre::withoutGlobalScopes()->where('name','=',$row['primary_genre'])->first();
            $secondary_genre = Genre::withoutGlobalScopes()->where('name','=',$row['secondary_genre'])->first();
            if(isset($display_artist) && $row['upc'] != '' && !Album::withoutGlobalScopes()->where('upc', $row['upc'])->exists()) {
                $album = new Album();
                    $album->user_id = $user->id;
                    $album->title = $row['title'];
                    $album->type = $album_type->id;
                    $album->label = $row['label'];
                    $album->remix_version = $row['remix_version'];
                    $album->display_artist = $display_artist->id;
                    $album->genre = $genre->id;
                    $album->second_genre = $secondary_genre->id;
                    $album->artistIds = $user->artist_id;
                    $album->primary_artist = $row['primary_artist'];
                    $album->composer = $row['composer'];
                    $album->arranger = $row['arranger'];
                    $album->lyricist = $row['lyricist'];
                    $album->upc = $row['upc'];
                    $album->grid = $row['grid'];
                    $album->language = $row['language'];
                    $album->ref = $row['ref'];
                    $album->price_category = 3;
                    $album->released_at = $row['original_release'];
                    $album->created_at = $row['publish_date'];
                    $album->license_name = $row['license_name'];
                    $album->license_year = $row['license_year'];
                    $album->recording_name = $row['recording_name'];
                    $album->recording_year = $row['recording_year'];
                    $album->approved = 1;
                    $album->paid = $row['paid'];
                /*$album->addMediaFromBase64(base64_encode(Image::make($row['cover_url'])->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));*/
                $album->save();

                $trx_id = new_transaction();
                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->album_id = $album->id;
                $transaction->transaction_id = $trx_id;
                $transaction->save();

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
                if(isset($row['participant'])){
                    $participant = explode(";",$row['participant']);
                    for($i=0;$i<count($participant);$i++)
                    {
                        $role = explode(":",$participant[$i]);
                        DB::table('album_artist')->insert([
                            'album_id' => $album->id,
                            'artist_role' => array_search($role[0], $my_artist)+1,
                            'artist_name' => $role[1],
                        ]);
                    }
                }
                return $album;
            }else if (isset($display_artist) && $row['upc'] == '')
            {
                $album = new Album();
                $album->user_id = $user->id;
                $album->title = $row['title'];
                $album->type = $album_type->id;
                $album->label = $row['label'];
                $album->remix_version = $row['remix_version'];
                $album->display_artist = $display_artist->id;
                $album->genre = $genre->id;
                $album->second_genre = $secondary_genre->id;
                $album->artistIds = $user->artist_id;
                $album->primary_artist = $row['primary_artist'];
                $album->composer = $row['composer'];
                $album->arranger = $row['arranger'];
                $album->lyricist = $row['lyricist'];
                $album->upc = $row['upc'];
                $album->grid = $row['grid'];
                $album->language = $row['language'];
                $album->ref = $row['ref'];
                $album->price_category = 3;
                $album->released_at = $row['original_release'];
                $album->created_at = $row['publish_date'];
                $album->license_name = $row['license_name'];
                $album->license_year = $row['license_year'];
                $album->recording_name = $row['recording_name'];
                $album->recording_year = $row['recording_year'];
                $album->approved = 1;
                $album->paid = $row['paid'];
                /*$album->addMediaFromBase64(base64_encode(Image::make($row['cover_url'])->orientate()->fit(intval(config('settings.image_artwork_max', 500)),  intval(config('settings.image_artwork_max', 500)))->encode('jpg', config('settings.image_jpeg_quality', 90))->encoded))
                ->usingFileName(time(). '.jpg')
                ->toMediaCollection('artwork', config('settings.storage_artwork_location', 'public'));*/
                $album->save();

                $trx_id = new_transaction();
                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->album_id = $album->id;
                $transaction->transaction_id = $trx_id;
                $transaction->save();

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
                if(isset($row['participant'])){
                    $participant = explode(";",$row['participant']);
                    for($i=0;$i<count($participant);$i++)
                    {
                        $role = explode(":",$participant[$i]);
                        DB::table('album_artist')->insert([
                            'album_id' => $album->id,
                            'artist_role' => array_search($role[0], $my_artist)+1,
                            'artist_name' => $role[1],
                        ]);
                    }
                }
                return $album;
            }
        }
    }
}
