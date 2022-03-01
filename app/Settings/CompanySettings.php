<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CompanySettings extends Settings
{
    
    public string $name;
    public string $website;
    public string $logo;
    public string $addresse;
    public string $telephone;
    public string $email;
    public string $rc;
    public string $ice;
    public string $cnss;
    public string $patente;
    public string $if;

    
    public static function group(): string
    {
        return 'company';
    }
}
