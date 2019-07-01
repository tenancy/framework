<?php

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

namespace Tenancy\Affects;

use Tenancy\Contracts\AffectsApp;
use Tenancy\Identification\Events\Switched;
use Tenancy\Pipeline\Step;

abstract class Affect extends Step implements AffectsApp
{
    public function fires(): bool
    {
        return $this->event instanceof Switched;
    }
}
