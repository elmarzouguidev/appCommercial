<?php

use App\Settings\CompanySettings;
use App\Settings\DocumentSettings;


function getDocument(): DocumentSettings
{
    return app(DocumentSettings::class);
}

function getCompany(): CompanySettings
{
    return app(CompanySettings::class);
}
