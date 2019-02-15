<?php

namespace Tenancy\Database\Generators;

use Tenancy\Database\Contracts\ProvidesPassword;

class DefaultPasswordGenerator implements ProvidesPassword {
    public function generate(Tenant $tenant) : string {
        md5(sprintf(
            '%s.%s',
            $tenant->getTenantKey(),
            $tenant->created_at
        ));
    }
}
