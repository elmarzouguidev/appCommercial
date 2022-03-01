<?php

namespace App\Http\Controllers\Importer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\Importer\CSV\CSVImporterJob;
use App\Models\Utilities\Sale;

class ImporterController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {

        if ($request->hasFile('file')) {

            //$data = array_map('str_getcsv', file($request->file));
            $data = file($request->file);

            //$header = $data[0];

            // unset($data[0]); //remove it form array (becouse it the columns name)

            //chuncking file
            $chunks = array_chunk($data, 1000);

            //dd($chunks[0]);

            // convert 1000 records to a new csv file

            foreach ($chunks as $key => $chnuk) {

                $name = "/temp{$key}.csv";

                $path = storage_path('csv_files');

                file_put_contents($path . $name, $chnuk);
            }

            //$this->store();
        }
    }
    

    public function store()
    {

        $path = storage_path('csv_files');

        $files = glob("$path/*.csv");

        $header = [];

        foreach ($files as $key => $file) {

            $data = array_map('str_getcsv', file($file));

            if ($key === 0) {

                $header = $data[0];

                unset($data[0]);
            }

            CSVImporterJob::dispatch($data, $header);
        }

        unlink($file);

        return 'Stored !!';
    }

    public function storeTow()
    {

        $path = storage_path('csv_files');

        $files = glob("$path/*.csv");

        $header = [];

        foreach ($files as $key => $file) {

            $data = array_map('str_getcsv', file($file));

            if ($key === 0) {

                $header = $data[0];

                unset($data[0]);
            }

            CSVImporterJob::dispatch($data, $header);
        }

        unlink($file);

        return 'Stored !!';
    }
}
