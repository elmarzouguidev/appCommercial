<?php

namespace Elmarzougui\Roles\Helpers;

use Spatie\Permission\Models\Role;



class Roles {


    public static function new()
    {
      return new Role();
    }


}