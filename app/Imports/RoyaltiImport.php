<?php

namespace App\Imports;

use App\Models\Royalti;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoyaltiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $song = Song::withoutGlobalScopes()->where('isrc','=',$row['isrc'])->first();
        if(isset($song)){
            return new Royalti([
                "song_id" => $song->id,
                "patner" => $row['channel'],
                "value" => $row['taxesnet_total_client_currency'],
            ]);
        }
    }
}