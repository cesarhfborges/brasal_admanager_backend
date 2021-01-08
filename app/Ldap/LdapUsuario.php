<?php

namespace App\Ldap;

use LdapRecord\Models\Model;

class LdapUsuario extends Model
{
    protected $connection = 'zflexldap';

    public static $objectClasses = [
        'top',
        'person',
        'organizationalperson',
        'user',
    ];
}
