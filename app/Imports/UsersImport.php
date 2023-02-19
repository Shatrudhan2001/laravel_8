<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

       
    public function model(array $row)
    {
        // dd($row);
        $password        = 'Bsrs@'.rand(1000,9999).'#';
        return new Member([
            "name"                      => $row['resident'],
            "email"                     => '',
            "phone"                     => $row['mobile_no'],
            'pocket_id'                 => $row['pocket_id'],
            'opening_balance'           => $row['opening_balance'],
            'closing_balance'           => $row['closing_balance'],
            'payment_mode'              => $row['pocket_id'],
            'amount'                    => $row['dec_2022'],
            'payment_date'              => $row['mode_of_payment'],
            'sub_recd'                  => $row['sub_recd'],
            'res_signature'             => $row['res_signature'],
            'block_sheet'               => $row['block_sheet'],
            'updated_at'                => date("Y-m-d h:i:s"),
            'created_at'                => date("Y-m-d h:i:s"),
            'password'                  => Hash::make($password),
            'password_view'             => $password
        ]);
    }
}