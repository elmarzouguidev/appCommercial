<?php

namespace App\Listeners;

use Log;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class MediaListeners
{
    public function handle(MediaHasBeenAdded $event)
    {
        $media = $event->media;
        $path = $media->getPath();
        info("file {$path} has been saved for media {$media->id}");
    }
}
