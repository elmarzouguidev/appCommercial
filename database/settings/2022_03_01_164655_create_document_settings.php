<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateDocumentSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('document.invoice_prefix', 'FACT-');
        $this->migrator->add('document.invoice_start', 1);

        $this->migrator->add('document.invoice_avoir_prefix', 'AVOIR-');
        $this->migrator->add('document.invoice_avoir_start', 11);

        $this->migrator->add('document.estimate_prefix', 'DEVIS-');
        $this->migrator->add('document.estimate_start', 1);

        $this->migrator->add('document.bc_prefix', 'BC-');
        $this->migrator->add('document.bc_start', 1);

    }
}
