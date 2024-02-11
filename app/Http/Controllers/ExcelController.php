<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExcelExport;
use App\Models\Berkas as ModelsBerkas;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class ExcelController extends Controller
{
    public function show($id)
    {
        $databerkas = ModelsBerkas::find($id);
        $dataViewBerkas =[
            'data' => $databerkas
        ];
        // dd($databerkas);
        try {
            $filePath = storage_path('app/public/' . 'fileExcel/' . $databerkas->file_excel);
            $reader = IOFactory::createReaderForFile($filePath);
            $spreadsheet = $reader->load($filePath);
            $sheet = $spreadsheet->getActiveSheet();

            $data = [];
            foreach ($sheet->getRowIterator() as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }
            // dd($data);
            // return view('index', ['excelData' => $data]);
            // array_push($dataViewBerkas, ["excelData" => $data]);
            $dataViewBerkas['excelData'] = $data;

        } catch (Exception $e) {
            dd($e->getMessage());
        }



    //   dd(databerkas);
        return view('berkas.detail',$dataViewBerkas);
    }
}
