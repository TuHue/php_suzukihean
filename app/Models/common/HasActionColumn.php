<?php

namespace App\Models\common;

use \Cartalyst\Sentinel\Laravel\Facades\Sentinel;

trait HasActionColumn
{
    public function generateActionColumn()
    {
        if (! method_exists($this, 'getActionColumnPermissions')) {
            return [];
        }

        $actionColumn = [];

        $currentUser = Sentinel::getUser();

        $permissions = $this->getActionColumnPermissions();

        foreach ($permissions as $key => $value) {
//            if ($currentUser->hasAccess($key)) {
//                $actionColumn[] = $value;
//            }

            $actionColumn[] = $value;
        }

        return implode(' ', $actionColumn);
    }
}
