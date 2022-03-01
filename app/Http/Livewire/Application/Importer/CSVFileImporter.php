<?php

namespace App\Http\Livewire\Application\Importer;

use App\Jobs\Importer\CSV\CSVImporterJob;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Livewire\WithFileUploads;

class CSVFileImporter extends Component
{
    use WithFileUploads;

    public $batchId;
    public $importFile;
    public $importing = false;
    public $importFinished = false;
    public $importProg = 0;

    public function import()
    {
        $this->validate([
            'importFile' => ['required', 'mimes:csv,txt']
        ]);

        $this->importing = true;

        if ($this->importFile) {
            //dd($this->file->getRealPath());
            $data   =   file($this->importFile->getRealPath());

            //dd($data);
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

            $this->batchId = $batch->id;
        }
    }

    public function getImportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }
    

    public function updateImportProgress()
    {
        $this->importFinished = $this->importBatch->finished();

        $this->importProg = $this->importBatch->progress();

        if ($this->importFinished) {
            // Storage::delete($this->importFilePath);
            $this->importing = false;
        }
    }
    public function updateImportProgressPercent()
    {

        $this->importProg = $this->importBatch->progress();
    }

    public function render()
    {
        return view('theme.livewire.application.importer.c-s-v-file-importer');
    }
}
