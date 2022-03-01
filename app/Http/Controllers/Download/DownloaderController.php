<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;

class DownloaderController extends Controller
{
    public function download(Ticket $yourModel)
    {
         // Let's get some media.
         $downloads = $yourModel->getMedia('tickets-images');
 
         // Download the files associated with the media in a streamed way.
         // No prob if your files are very large.
         return MediaStream::create('my-files.zip')->addMedia($downloads);
    }
}
