<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateDocumentSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('invoice.prefix', 'FACT-');
        $this->migrator->add('invoice.start', 1);

        $this->migrator->add('invoice_avoir.prefix', 'AVOIR-');
        $this->migrator->add('invoice_avoir.start', 11);

        $this->migrator->add('estimate.prefix', 'DEVIS-');
        $this->migrator->add('estimate.start', 1);

        $this->migrator->add('bc.prefix', 'BC-');
        $this->migrator->add('bc.start', 1);

    }
}
