<?php

namespace App\Exports;

use App\Models\Album;
use Date;
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
            [
                'description', date("Y-m-d").'-EXPORT-'.date("h:mA")
            ],
            [
                'format_version', '4'
            ],
            [
                'total_releases', 'dikalkulasi'
            ],
            [
                'total_tracks', 'total jumlah row'
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
                '#track_count'
                // '#isrc',
                // '#iswc',
                // '#track_title',
                // '#remix_or_version',
                // '#participants',
                // '#primary_genre',
                // '#secondary_genre',
                // '#language',
                // '#explicit_lyrics',
                // '#p_year',
                // '#p_line',
                // '#audio_url'
            ]
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Album::all();
    }

     /**
     * @var Id $id
     * @return array
     */
    public function map($jumlahRow): array
    {
        return [
            $jumlahRow->id,
            '=COUNT(A8+1)',
        ];
    }
}
