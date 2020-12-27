<?php
namespace App\Handlers;

use App\Models\User;
use Adldap\Models\User as LdapUser;

class LdapAttributeHandler
{
    /**
     * Synchronizes ldap attributes to the specified model.
     *
     * @param LdapUser     $ldapUser
     * @param User $eloquentUser
     *
     * @return void
     */
    public function handle(LdapUser $ldapUser, User $eloquentUser)
    {
        $a = $ldapUser;

        $eloquentUser->objectguid = $ldapUser->getObjectGuid();
        $eloquentUser->name = $ldapUser->getCommonName();
        $eloquentUser->email = $ldapUser->getUserPrincipalName();
        $eloquentUser->username = $ldapUser->getAccountName();
        $eloquentUser->password = $ldapUser->getAuthPassword();
        $eloquentUser->dn = $ldapUser->getDn();
        $eloquentUser->save();
    }
}
