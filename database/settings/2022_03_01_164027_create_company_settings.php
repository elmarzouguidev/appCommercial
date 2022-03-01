<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateCompanySettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.name', 'Elmarzougui WEB');
        $this->migrator->add('company.website', 'https://elmarzougui.net');
        $this->migrator->add('company.logo', 'logo.png');
        $this->migrator->add('company.addresse', 'casablanca sidi massoud');
        $this->migrator->add('company.telephone', '+212677512753');
        $this->migrator->add('company.email', 'abdelgha4or@gmail.com');
        $this->migrator->add('company.rc', '00000000');
        $this->migrator->add('company.ice', '002621028000049');
        $this->migrator->add('company.cnss', '114375337');
        $this->migrator->add('company.patente', '32902003');
        $this->migrator->add('company.if', '45960204');
    }
}
