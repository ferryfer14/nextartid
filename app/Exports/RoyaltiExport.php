<?php

namespace App\Exports;

use App\Models\Album;
use App\Models\AlbumSong;
use App\Models\Royalti;
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
use Carbon\Carbon;

//class AlbumsExport implements FromCollection,WithCustomCsvSettings,WithHeadings
class RoyaltiExport implements FromCollection,WithHeadings,WithColumnFormatting,WithMapping
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
            'A'     => NumberFormat::FORMAT_TEXT,
            'B2'    => NumberFormat::FORMAT_GENERAL,
            'B3:B6' => NumberFormat::FORMAT_NUMBER,
            'C:N'   => NumberFormat::FORMAT_TEXT,
            'O:P'   => NumberFormat::FORMAT_DATE_YYYYMMDD,
            // 'P'  => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'S'     => NumberFormat::FORMAT_NUMBER,
            'T'     => NumberFormat::FORMAT_TEXT,
            'U'     => NumberFormat::FORMAT_NUMBER,
            'V:X'   => NumberFormat::FORMAT_TEXT,
            'Y'     => NumberFormat::FORMAT_NUMBER,
            'Z:AH'  => NumberFormat::FORMAT_TEXT,
            'AI'    => NumberFormat::FORMAT_NUMBER,
            'AJ:AK'  => NumberFormat::FORMAT_TEXT,
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
                '#Export Royalti'
            ],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $royalti = Royalti::withoutGlobalScopes()->whereIn('song_id', AlbumSong::withoutGlobalScopes()->select('song_id')->where('album_id', $this->id)->get())->get();
        return $royalti;
    }

     /**
     * @var Id $id
     * @return array
     */
    public function map($royalti): array
    {
        $result = [
            [
                'Song Name',
                'Isrc',
                'Channel',
                'Country',
                'Start Date',
                'End Date',
                'Value'
            ],
            [
                $royalti->song->title,
                $royalti->song->isrc,
                $royalti->patner,
                $royalti->country,
                $royalti->start_date,
                $royalti->end_date,
                '$'.$royalti->value
                ]
            ];
        $new_result = [
            [
                $royalti->song->title,
                $royalti->song->isrc,
                $royalti->patner,
                $royalti->country,
                $royalti->start_date,
                $royalti->end_date,
                '$'.$royalti->value
            ]
        ];
        if($this->index == 0){
            $this->index++;
            return $result;
        }
        return $new_result;
    }
}
