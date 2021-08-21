<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Proxy;

use FFI\Proxy\Exception\NotAvailableException;

abstract class Proxy implements ProxyInterface, ApiInterface
{
    use ProxyAwareTrait;
    use ApiAwareTrait;

    /**
     * @psalm-allow-private-mutation
     * @psalm-readonly
     * @var \FFI
     */
    public \FFI $ffi;

    /**
     * Proxy should not be serializable.
     */
    public function __sleep(): array
    {
        throw new NotAvailableException('Cannot serialize proxy class');
    }

    /**
     * Proxy should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new NotAvailableException('Cannot unserialize proxy class');
    }

    /**
     * Proxy should not be serializable.
     */
    public function __serialize(): array
    {
        throw new NotAvailableException('Cannot serialize proxy class');
    }

    /**
     * Proxy should not be restorable from strings.
     */
    public function __unserialize(array $data): void
    {
        throw new NotAvailableException('Cannot unserialize proxy class');
    }

    /**
     * Proxy should not be cloneable.
     */
    public function __clone()
    {
        throw new NotAvailableException('Cannot clone proxy class');
    }
}
