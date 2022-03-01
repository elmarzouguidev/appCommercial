<?php

namespace App\Http\Controllers\Importer;

use App\Http\Controllers\Controller;
use App\Jobs\Importer\CSV\CSVImporterJob;
use App\Models\Utilities\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class CSVImporterController extends Controller
{


    public function index()
    {
        return view('upload');
    }

    public function upload()
    {
        if (request()->has('mycsv')) {
            $data   =   file(request()->mycsv);
            // Chunking file
            $chunks = array_chunk($data, 1000);

            $header = [];
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new CSVImporterJob($data, $header));
            }

            return $batch;
        }

        return 'please upload file';
    }

    public function batch()
    {
        $batchId = request('id');
        
        return Bus::findBatch($batchId);
    }

    public function batchInProgress()
    {
        $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->get();
        if (count($batches) > 0) {
            return Bus::findBatch($batches[0]->id);
        }

        return [];
    }
}
