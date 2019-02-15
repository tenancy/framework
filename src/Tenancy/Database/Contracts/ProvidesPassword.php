<?php declare(strict_types=1);

namespace Tenancy\Database\Contracts;

use Tenancy\Identification\Contracts\Tenant;

interface ProvidesPassword
{
    /**
     * @param Tenant $tenant
     * @return string
     */
    public function generate(Tenant $tenant): string;
}
