<?php

use App\Settings\DocumentSettings;


function getDocumentPrefix(): DocumentSettings
{
    return app(DocumentSettings::class);
}

function getDocumentStart(): DocumentSettings
{
    return app(DocumentSettings::class);
}

