<?php

namespace App\Http\Controllers\Developper;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DevController extends Controller
{

    protected array $tables = ['invoices', 'invoices_avoir', 'estimates', 'bills', 'articles'];

    public function clearTables()
    {
        foreach ($this->tables as $name) {
            //if you don't want to truncate migrations
            //if ($name == 'migrations') {
            //continue;
            //}
            //  DB::table($name)->truncate();
        }
    }

    public function storageLink()
    {
        Artisan::call('storage:link');
    }
}
