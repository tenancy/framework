<?php declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://laravel-tenancy.com
 * @see https://github.com/tenancy
 */

namespace Tenancy\Database;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Traits\Macroable;
use Tenancy\Database\Contracts\ProvidesDatabase;
use Tenancy\Database\Contracts\ResolvesConnections;
use Tenancy\Identification\Contracts\Tenant;

class DatabaseResolver implements ResolvesConnections
{
    use Macroable;

    /**
     * @var Dispatcher
     */
    protected $events;

    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }

    public function __invoke(Tenant $tenant = null, string $connection = null): ?ProvidesDatabase
    {
        $provider = $this->events->until(new Events\Resolving($tenant, $connection));

        if ($provider) {
            $this->events->dispatch(new Events\Identified($tenant, $connection, $provider));
        }

        $this->events->dispatch(new Events\Resolved($tenant, $connection, $provider));

        return $provider;
    }
}
