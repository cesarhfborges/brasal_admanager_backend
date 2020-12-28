<?php
namespace App\Rules;

use Adldap\Laravel\Validation\Rules\Rule;
use Illuminate\Support\Str;

class OnlyManagersAndAccounting extends Rule
{
    /**
     * Determines if the user is allowed to authenticate.
     *
     * @return bool
     */
    public function isValid()
    {
        $ous = [
            'CN=Supervisores,CN=Users,DC=darvsistemas,DC=local',
        ];

        return Str::contains($this->user->getDn(), $ous);
    }
}
