<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use PhpOffice\PhpSpreadsheet\IOFactory;
use DB;
// use Illuminate\Support\Facades\Hash;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        // validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // get the uploaded file
        $file = $request->file('file');

        // read the file data
        $spreadsheet = IOFactory::load($file);

        // get the first sheet data
        $sheet = $spreadsheet->getSheet(0);

        // get the highest row number
        $highestRow = $sheet->getHighestRow();

        // loop through the rows
        $newArray = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            // get the data for the current row
            $data = $sheet->rangeToArray('A' . $row . ':' . $sheet->getHighestColumn() . $row, null, true, false);
            // echo "<pre>";
            // print_r($data);
            // die;
            $password        = 'Bsrs@'.rand(1000,9999).'#';
           
            // // insert the data into the database
            $newArray[] = [
                'pocket_id'          => $data[0][0],
                "name"               => $data[0][1],
                "phone"              => $data[0][2],
                'opening_balance'    => $data[0][3],
                'amount'             => $data[0][4],
                'sub_recd'           => $data[0][5],
                'closing_balance'    => $data[0][6],                
                'payment_date'       => $data[0][7],
                'payment_mode'       => $data[0][8],
                'res_signature'      => $data[0][9],
                'block_sheet'        => $data[0][10],
                'updated_at'         => date("Y-m-d h:i:s"),
                'created_at'         => date("Y-m-d h:i:s"),
                'password'           => Hash::make($password),
                'password_view'      => $password
            ];
        }
    
        array_shift($newArray); // Remove first element of array(remove heading of excel file)
        Member::insert($newArray);
        return back()->with('status', 'Data Imported successfully.');
    }
}