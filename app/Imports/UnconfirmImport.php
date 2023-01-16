<?php

namespace App\Imports;

use App\Models\Balance;
use App\Models\Royalti;
use App\Models\RoyaltiUnconfirm;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnconfirmImport implements ToModel, WithHeadingRow
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
            /*$balance = new Balance();
            $balance->user_id = $song->user_id;
            $balance->jenis = "Royalti ".$row['channel'];
            $balance->value = $row['net_total_usd'];
            $balance->save();*/
            return new RoyaltiUnconfirm([
                "song_id" => $song->id,
                "patner" => $row['channel'],
                "value" => $row['net_total_client_currency'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "country" => $row['country']
            ]);
        }
    }
}
