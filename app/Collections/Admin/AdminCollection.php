<?php

namespace App\Collections\Admin;

use Illuminate\Database\Eloquent\Collection;

class AdminCollection extends Collection
{

    /**
     * @return AdminCollection
     */
    public function groupByPosition(): AdminCollection
    {
        return $this->groupBy(function ($admin) {

            if ($admin->super_admin) {
                return 'SuperAdmins';
            } else {
                return 'NormalAdmins';
            }
        });
    }
}
