<?php

namespace App\Mail\Backup\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientDataExportReady extends Mailable
{
    use Queueable, SerializesModels;

    private $path;
    private $client;

    /**
     * ClientDataExportReady constructor.
     * @param $client
     * @param $path
     */
    public function __construct($client, $path)
    {
        $this->client = $client;
        $this->path = $path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
