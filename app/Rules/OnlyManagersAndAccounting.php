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
            'ou=Accounting,dc=acme,dc=org',
            'ou=Managers,dc=acme,dc=org',
        ];

        return Str::contains($this->user->getDn(), $ous);
    }
}
