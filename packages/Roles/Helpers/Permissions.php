<?php

namespace Elmarzougui\Roles\Helpers;


use Spatie\Permission\Models\Permission;

class Permissions {


    public static function new()
    {
      return new Permission();
    }

}