<?php

namespace App\Helpers;

use Illuminate\Support\Str;

trait RepositoryLoader
{
    
    public function getRegisterRepositories($namespace = 'App\Repositories')
    {
        $finder = new \Symfony\Component\Finder\Finder();

        $files =  $finder->files()->name(['*Interface.php', '*Repository.php'])->in(app_path('Repositories'));

        foreach ($files as $index => $file) {

            $ns = $namespace;
            if ($relativePath = $file->getRelativePath()) {

                $ns .= '\\' . strtr($relativePath, '/', '\\');
            }

            if (Str::contains($file->getFilename(), "Repository.php")) {

                $classes[$file->getRelativePath()]['concrete'] = $ns . '\\' . $file->getBasename('.php');
            }
            if (Str::contains($file->getFilename(), "Interface.php")) {

                $classes[$file->getRelativePath()]['abstract'] = $ns . '\\' . $file->getBasename('.php');
            }
        }

        return $classes;
    }
}
