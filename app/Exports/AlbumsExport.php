<?php

namespace App\Exports;

use App\Models\Album;
use App\Models\Song;
use Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

//class AlbumsExport implements FromCollection,WithCustomCsvSettings,WithHeadings
class AlbumsExport implements FromCollection,WithHeadings,WithColumnFormatting,WithMapping
{
    protected $id;
    protected $index = 0;

    function __construct($id) {
            $this->id = $id;
    }
    // public function map($invoice): array
    // {
    //     return [
    //         $invoice->invoice_number,
    //         Date::dateTimeToExcel($invoice->created_at),
    //         $invoice->total
    //     ];
    // }
    
    public function columnFormats(): array
    {
        return [
            'B2'    => NumberFormat::FORMAT_GENERAL,
            'B3:B6' => NumberFormat::FORMAT_NUMBER,
            // 'B4' => NumberFormat::FORMAT_NUMBER,
            // 'B5' => NumberFormat::FORMAT_NUMBER,
            // 'B6' => NumberFormat::FORMAT_NUMBER,
        ];
    }
/*    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
*/
    public function headings(): array
    {
        return [
            [
                '#metadata'
            ],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    private function roles($id){
        $my_artist=array();
        array_push($my_artist,'Primary Artist');
        array_push($my_artist,'Performer');
        array_push($my_artist,'Producer');
        array_push($my_artist,'Remixer');
        array_push($my_artist,'Composer');
        array_push($my_artist,'Lyricist');
        array_push($my_artist,'Publisher');
        array_push($my_artist,'Featuring');
        array_push($my_artist,'with');
        array_push($my_artist,'Featuring');
        array_push($my_artist,'Arranger');
        return $my_artist[$id-1];
    }
    private function priceCategory($id){
        $price=array();
        array_push($price,'Budget');
        array_push($price,'Mid');
        array_push($price,'Full');
        array_push($price,'Premium');
        return $price[$id-1];
    }
    public function collection()
    {
        $album = Album::withoutGlobalScopes()
        ->select('albums.*','artists.name','users.email','g.name as genre_name','sg.name as second_genre_name')
        ->join('artists','artists.id','albums.display_artist')
        ->join('users','users.id','albums.user_id')
        ->join('genres as g','g.id','albums.genre')
        ->join('genres as sg','sg.id','albums.second_genre')
        ->where('albums.id',$this->id)
        ->get();
        $album_roles = DB::table('album_artist')
        ->where('album_id',$this->id)
        ->get();
        $roles_album = '';
        foreach($album_roles as $r){
            $roles_album .= $this->roles($r->artist_role).':'.$r->artist_name.';';
        }
        foreach ($album as $a) {
            $a->roles_album = $roles_album;
        }
        $song = Song::leftJoin('album_songs', 'album_songs.song_id', '=', (new Song)->getTable() . '.id')
            ->select((new Song)->getTable() . '.*', 'album_songs.id as host_id','g.name as genre_name','sg.name as second_genre_name')
            ->leftJoin('genres as g','g.id',(new Song)->getTable() . '.genre')
            ->leftJoin('genres as sg','sg.id',(new Song)->getTable() . '.second_genre')
            ->where('album_songs.album_id', $this->id)
            ->get();    
        foreach ($song as $s) {
            $song_roles = DB::table('album_artist')
            ->where('song_id',$s->id)
            ->get();
            $roles_song = '';
            foreach($song_roles as $r){
                $roles_song .= $this->roles($r->artist_role).':'.$r->artist_name.';';
            }
            $s->roles_song = $roles_song;
        }
        foreach ($song as $s) {
            $s->album = $album;
        }
        //$album->setRelation('songs', $album->songs()->withoutGlobalScopes()->get());
        return $song;
    }

     /**
     * @var Id $id
     * @return array
     */
    public function map($song): array
    {
        $result = [
            [
                'description', date("Y-m-d").'-EXPORT-'.date("h:mA")
            ],
            [
                'format_version', '4'
            ],
            [
                'total_releases', '1'
            ],
            [
                'total_tracks', $song->album->song_count
            ],
            [
                '#release_info','','','','','','','','','','','','','','','','','','','','','','','','','#track_info'
            ],
            [
                '#action',
                '#upc',
                '#catalog_number',
                '#grid',
                '#title',
                '#remix_or_version',
                '#user_email',
                '#label',
                '#participants',
                '#primary_genre',
                '#secondary_genre',
                '#language',
                '#explicit_lyrics',
                '#price_category',
                '#digital_release',
                '#original_release',
                '#license_type',
                '#license_info',
                '#c_year',
                '#c_line',
                '#p_year',
                '#p_line',
                '#territories',
                '#cover_url',
                '#track_count',
                '#isrc',
                '#iswc',
                '#track_title',
                '#remix_or_version',
                '#participants',
                '#primary_genre',
                '#secondary_genre',
                '#language',
                '#explicit_lyrics',
                '#p_year',
                '#p_line',
                '#audio_url'
            ],
            [
                '',
                $song->album->upc ?? 'auto',
                '',
                $song->album->grid,
                $song->album->title,
                $song->album->remix_version,
                $song->album->email,
                $song->album->label,
                substr('primary:'.$song->album->primary_artist.';composer:'.$song->album->composer.';arranger:'.$song->album->arranger.';lyricist:'.$song->album->lyricist.';'.$song->album->roles_album, 0, -1),
                $song->album->genre_name,
                $song->album->second_genre_name,
                $song->album->language == '1' ? 'Indonesia' : 'English',
                'no',
                'Premium',
                date('m/d/Y', strtotime($song->album->created_at)),
                date('m/d/Y', strtotime($song->album->released_at)),
                '(c)',
                '',
                $song->album->license_year,
                $song->album->license_name,
                $song->album->recording_year,
                $song->album->recording_name,
                'WD',
                $song->album->artwork_url,
                '1',
                $song->isrc ?? 'auto',
                $song->iswc,
                $song->title,
                $song->remix_version,
                substr('primary:'.$song->primary_artist.';composer:'.$song->composer.';arranger:'.$song->arranger.';lyricist:'.$song->lyricist.';'.$song->roles_song, 0, -1),
                $song->genre_name,                
                $song->second_genre_name,          
                $song->language == '1' ? 'Indonesia' : 'English',
                $song->explicit == '0' ? 'no' : 'yes',
                $song->publisher_year,
                $song->publisher_name,
                URL::to('/storage/'.$song->originalfile),
                ]
            ];
        $new_result = [
            [
                '',
                $song->album->upc ?? 'auto',
                '',
                $song->album->grid,
                $song->album->title,
                $song->album->remix_version,
                $song->album->email,
                $song->album->label,
                substr('primary:'.$song->album->primary_artist.';composer:'.$song->album->composer.';arranger:'.$song->album->arranger.';lyricist:'.$song->album->lyricist.';'.$song->album->roles_album, 0, -1),
                $song->album->genre_name,
                $song->album->second_genre_name,
                $song->album->language == '1' ? 'Indonesia' : 'English',
                'no',
                'Premium',
                date('m/d/Y', strtotime($song->album->created_at)),
                date('m/d/Y', strtotime($song->album->released_at)),
                '(c)',
                '',
                $song->album->license_year,
                $song->album->license_name,
                $song->album->recording_year,
                $song->album->recording_name,
                'WD',
                $song->album->artwork_url,
                '1',
                $song->isrc ?? 'auto',
                $song->iswc,
                $song->title,
                $song->remix_version,
                substr('primary:'.$song->primary_artist.';composer:'.$song->composer.';arranger:'.$song->arranger.';lyricist:'.$song->lyricist.';'.$song->roles_song, 0, -1),
                $song->genre_name,                
                $song->second_genre_name,          
                $song->language == '1' ? 'Indonesia' : 'English',
                $song->explicit == '0' ? 'no' : 'yes',
                $song->publisher_year,
                $song->publisher_name,
                URL::to('/storage/'.$song->originalfile),
                ]
            ];
        if($this->index == 0){
            $this->index++;
            return $result;
        }
        return $new_result;
    }
}
