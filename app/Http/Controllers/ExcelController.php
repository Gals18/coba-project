<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use App\Models\Berkas as ModelsBerkas;
use App\Models\Pengguna;

class ExcelController extends Controller
{
    public function show($id)
    {
        $databerkas = ModelsBerkas::find($id);
       $datapegawai = Pengguna::find(session($id));
        $data = [
            'data'=>$databerkas,
            'pegawai' => $datapegawai,
        ];
        try {
            $filePath = storage_path('app/pubic/fileExcel/{$data->file_excel}');
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
            return view('berkas.detail', ['excelData' => $data]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        //   dd(databerkas);
    }

    public function readExcelFromDirectory()
    {
       
    }
}
