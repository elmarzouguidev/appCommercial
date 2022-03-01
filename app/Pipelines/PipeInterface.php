<?php

namespace App\Pipelines;

use Closure;

interface PipeInterface
{
    public function handle($content, Closure $next);
}
