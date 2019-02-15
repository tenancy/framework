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

namespace Tenancy\Database\Drivers\Mysql\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Tenancy\Database\Drivers\Mysql\Listeners\ConfiguresTenantConnection;
use Tenancy\Database\Events\Resolving;

class DatabaseProvider extends EventServiceProvider
{
    protected $listen = [
        Resolving::class => [
            ConfiguresTenantConnection::class
        ]
    ];

    public function register()
    {
        $this->publishes([__DIR__ . '/../resources/config/db-driver-mysql.php'], 'db-driver-mysql');

        $this->mergeConfigFrom(__DIR__ . '/../resources/config/db-driver-mysql.php', 'db-driver-mysql');
    }
}
