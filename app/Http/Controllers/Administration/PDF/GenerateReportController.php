<?php

namespace App\Http\Controllers\Administration\PDF;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GenerateReportController extends Controller
{


    public function ticketReport(Ticket $ticket)
    {
        $ticket->load(['client', 'technicien']);
        $image = Media::whereModelType('App\Models\Ticket')->whereModelId($ticket->id)->first()->getPath('normal');
        $data = [
            'images' => Media::whereModelType('App\Models\Ticket')->whereModelId($ticket->id)->first()->getPath('normal'),
            'logo'=>"data:image/svg+xml;base64,". base64_encode($image)
        ];
       //dd($data,  $image);

        $pdf = \PDF::loadView('theme.pages.Ticket.__pdf.Report.index', compact('ticket','data'));

        $fileName = $ticket->code . 'RAPPORT.pdf';

        return $pdf->stream($fileName);

        // return view('theme.pages.Ticket.__pdf.Report.index', compact('ticket'));
    }

}
