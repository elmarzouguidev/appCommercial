<?php

namespace App\Pipelines;

use Closure;

class RemoveBadWords implements PipeInterface
{
    public function handle($content, Closure $next)
    {
        // Here you perform the task and return the updated $content
        // to the next pipe
        return  $next($content);
    }
}
