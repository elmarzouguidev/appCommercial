<?php
return [

    'notifications' => [
        'created' => 'New ticket has been opened successfully.',
        'updated' => 'Ticket has been updated successfully.',
    ],

    /*'statuses' => [
        \App\Constants\Status::TICKET_STATUS['non-traite'] => 'Non traité',
        \App\Constants\Status::TICKET_STATUS['encours-diagnostique'] => 'En cours de diagnostic',
        \App\Constants\Status::TICKET_STATUS['encours-de-reparation'] => 'En cours de réparation',
        \App\Constants\Status::TICKET_STATUS['retour-non-reparable'] => 'Retour non réparable',
        \App\Constants\Status::TICKET_STATUS['retour-devis-non-confirme'] => 'Retour Devis non réparable',
        \App\Constants\Status::TICKET_STATUS['retour-livre'] => 'Retour livré',
        \App\Constants\Status::TICKET_STATUS['en-attent-de-devis'] => 'En attente de devis',
        \App\Constants\Status::TICKET_STATUS['en-attente-de-bon-de-command'] => 'En attente de bon de command',
        \App\Constants\Status::TICKET_STATUS['devis-confirme'] => 'Devis Confirmé',
        \App\Constants\Status::TICKET_STATUS['a-reparer'] => 'à réparer',
        \App\Constants\Status::TICKET_STATUS['pret-a-etre-livre'] => 'Prêt à être livré',
        \App\Constants\Status::TICKET_STATUS['pret-a-etre-facture'] => 'Prêt à être Facturé',
    ],*/

    'statuses' => [
        \App\Constants\Status::NON_TRAITE => 'Non traité',
        \App\Constants\Status::EN_COURS_DE_DIAGNOSTIC => 'En cours de diagnostic',
        \App\Constants\Status::EN_COURS_DE_REPARATION => 'En cours de réparation',
        \App\Constants\Status::RETOUR_NON_REPARABLE => 'Retour non réparable',
        \App\Constants\Status::RETOUR_DEVIS_NON_CONFIRME => 'Retour Devis non réparable',
        \App\Constants\Status::RETOUR_LIVRE => 'Retour livré',
        \App\Constants\Status::EN_ATTENTE_DE_DEVIS => 'En attente de devis',
        \App\Constants\Status::EN_ATTENTE_DE_BON_DE_COMMAND => 'En attente de bon de command',
        \App\Constants\Status::DEVIS_CONFIRME => 'Devis Confirmé',
        \App\Constants\Status::A_REPARER => 'à réparer',
        \App\Constants\Status::PRET_A_ETRE_LIVRE => 'Prêt à être livré',
        \App\Constants\Status::PRET_A_ETRE_FACTURE => 'Prêt à être Facturé',
        \App\Constants\Status::LIVRE => 'Livré',
    ],

    'history' => [
        \App\Constants\Status::NON_TRAITE => ':user ajouter le Ticket',
        \App\Constants\Status::EN_COURS_DE_DIAGNOSTIC => ':user a commencer le diagnostique du ticket ...',
        \App\Constants\Status::EN_ATTENTE_DE_DEVIS => ':user a terminé le diagnostique et envoyer le ticket pour reponse de devis ',
        \App\Constants\Status::EN_ATTENTE_DE_BON_DE_COMMAND => ':user a envoyer le devis n :number en attendant le bon de commande',
        \App\Constants\Status::A_REPARER => ':user a confirmer la reparation du ticket ...',
        \App\Constants\Status::RETOUR_DEVIS_NON_CONFIRME => ':user a décliner la réparation du ticket ... pour refus du devis',

        \App\Constants\Status::DEVIS_CONFIRME => ':user mentionner que  le devis accepté, commencer la réparation',

        \App\Constants\Status::RETOUR_NON_REPARABLE => ':user mentionner que le ticket .... n\'est pas reparable',

        \App\Constants\Status::EN_COURS_DE_REPARATION => ':user a commencé la réparation du ticket',

        \App\Constants\Status::PRET_A_ETRE_LIVRE => ':user a finaliser la réparation du ticket .... , il est pret a etre livre',

        \App\Constants\Status::PRET_A_ETRE_FACTURE => 'Le produit Prêt à être Facturé',

        \App\Constants\Status::RETOUR_LIVRE => ':user a livré le produit',


        \App\Constants\Status::LIVRE => 'Le produit a été Livé par :user',

        /********************************************************************************/
        'rediger_le_rapport' => ':user a rédiger le rapport de diagnostic',

        'rediger_le_rapport_de_rep' => ':user a rédiger le rapport de réparation',
    ],
];
