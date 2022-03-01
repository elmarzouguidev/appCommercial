<?php

namespace App\Constants;

class Status
{

    public const NON_TRAITE = 1;
    public const EN_COURS_DE_DIAGNOSTIC = 2;
    public const EN_COURS_DE_REPARATION = 3;
    public const RETOUR_NON_REPARABLE = 4;
    public const RETOUR_DEVIS_NON_CONFIRME = 5;
    public const RETOUR_LIVRE = 6;
    public const EN_ATTENTE_DE_DEVIS = 7;
    public const EN_ATTENTE_DE_BON_DE_COMMAND = 8;
    public const DEVIS_CONFIRME = 9;
    public const A_REPARER = 10;
    public const PRET_A_ETRE_LIVRE = 11;
    public const PRET_A_ETRE_FACTURE = 12;
    public const LIVRE = 13;

    public const TICKET_STATUS = [
        'non-traite' => 1,
        'en-cours-de-diagnostic' => 2,
        'encours-de-reparation' => 3,
        'retour-non-reparable' => 4,
        'retour-devis-non-confirme' => 5,
        'retour-livre' => 6,
        'en-attent-de-devis' => 7,
        'en-attente-de-bon-de-command' => 8,
        'devis-confirme' => 9,
        'a-reparer' => 10,
        'pret-a-etre-livre' => 11,
        'pret-a-etre-facture' => 12,
        'livre' => 13
    ];


}
