<?php


return [

    'cache' => [

        'use-cache' => false,

        'cache-live-time' => 30,

        'clients_cache' => false
    ],

    'api-cache' => [
        'use-cache' => false,

        'cache-live-time' => 30
    ],

    'tickets' => [

        'prefix' => 'TCK',
    ],

    'clients' => [

        'prefix' => 'CLT',
    ],

    'invoices' => [
        'prefix' => 'FACTURE-',
        'start_from' => 800,
        'due_date_after' => 10
    ],

    'estimates' => [
        'prefix' => 'DEVIS-',
        'start_from' => 1501,
        'due_date_after' => 10,
        'default_condition' => "La majorité des dirigeants qui réalisent eux-mêmes leurs devis utilisent Excel pour faire leur modèle"
    ],

    'providers' => [
        'prefix' => 'FRNS-',

    ],

];
