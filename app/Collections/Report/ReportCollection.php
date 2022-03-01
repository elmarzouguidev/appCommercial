<?php

namespace App\Collections\Report;

use Illuminate\Database\Eloquent\Collection;

class ReportCollection extends Collection
{

    /**
     * @return ReportCollection
     */
    public function groupByStatus(): ReportCollection
    {

        return $this->groupBy(function ($report) {

            if ($report->status === 'ouvert') {
                return 'ouvert';
            }
            if ($report->status === 'envoyer') {
                return 'envoyer';
            }
            if ($report->status === 'annuler') {
                return 'annuler';
            }
            if ($report->status === 'confirme') {
                return 'confirme';
            }
            if ($report->status === 'attent-devis') {
                return 'attent-devis';
            }
            return 'normal';
        });
    }

    public function groupByConfirm(): ReportCollection
    {
        return $this->groupBy(function ($report) {

            if ($report->status === 'confirme') {
                return 'confirme';
            }
            if ($report->status === 'annuler') {
                return 'annuler';
            }
            if ($report->status === 'encours-reparation') {
                return 'encours-reparation';
            }
            return 'normal';
        });
    }
}
