<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearJobsTables extends Command
{

    protected $tables = ['failed_jobs', 'jobs', 'job_batches'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear jobs tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->tables as $name) {
            //if you don't want to truncate migrations
            //if ($name == 'migrations') {
            //continue;
            //}
            DB::table($name)->truncate();
            
        }
        return "Done !";
    }
}
