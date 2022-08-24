<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;
use App\Models\Account;
use App\Models\Userprofile;

class ImportExcelController extends Controller
{
    public function createexcel()
    {

        return view('admin.importexcel');
    }


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $dataInsert = [
                'name' => $row['name'],
                'age' =>  $row['age'],
                'address' => $row['address'],
                'price' => $row['price'],
            ];

            Account::create([
                'username' => $row['username'],
                'password' => $row['password'],
                'phonenumber' => $row['phonenumber'],
                'email' => $row['email'],
                'role' => $row['role'],
            ])->createuserprofile($dataInsert);
        }
    }


    public function batchSize(): int
    {
        return 500;
    }

    public function storeexcel(Request $request)
    {
        $file = $request->file('file');
        return view('admin.importexcel');
    }
}
