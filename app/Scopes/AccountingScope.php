<?php
namespace App\Scopes;

use Adldap\Query\Builder;
use Adldap\Laravel\Scopes\ScopeInterface;

class AccountingScope implements ScopeInterface
{
    /**
     * Apply the scope to a given LDAP query builder.
     *
     * @param Builder $query
     *
     * @return void
     */
    public function apply(Builder $query)
    {
        // The distinguished name of our LDAP group.
        $accounting = 'CN=Supervisores,CN=Users,DC=darvsistemas,DC=local';

        $query->whereMemberOf($accounting);
    }
}
