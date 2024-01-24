<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExcelExport;
use App\Models\Berkas as ModelsBerkas;

class ExcelController extends Controller
{
    public function show($id)
    {
        $databerkas = ModelsBerkas::find($id);
        $data =[
            'data'=>$databerkas
        ];
    //   dd(databerkas);
        return view('berkas.detail',$data);
    }
}
