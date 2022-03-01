<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.app_name', 'ERP');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.app_api', true);
        $this->migrator->add('general.app_api_token', true);
    }
}
