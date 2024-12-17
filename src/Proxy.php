<?php

declare(strict_types=1);

namespace FFI\Proxy;

use FFI\Proxy\Exception\NotAvailableException;

abstract class Proxy implements ApiInterface
{
    use ProxyAwareTrait;
    use ApiAwareTrait;

    /**
     * @psalm-allow-private-mutation
     *
     * @readonly
     */
    public \FFI $ffi;

    public function __construct(\FFI $ffi)
    {
        // @phpstan-ignore-next-line : Initialize readonly property
        $this->ffi = $ffi;

        if (!Registry::has(static::class)) {
            Registry::register($this);
        }
    }

    /**
     * Proxy should not be serializable.
     *
     * @throws NotAvailableException
     */
    public function __sleep(): array
    {
        throw new NotAvailableException('Cannot serialize proxy class');
    }

    /**
     * Proxy should not be restorable from strings.
     *
     * @throws NotAvailableException
     */
    public function __wakeup()
    {
        throw new NotAvailableException('Cannot unserialize proxy class');
    }

    /**
     * Proxy should not be serializable.
     *
     * @throws NotAvailableException
     */
    public function __serialize(): array
    {
        throw new NotAvailableException('Cannot serialize proxy class');
    }

    /**
     * Proxy should not be restorable from strings.
     *
     * @param array<array-key, mixed> $data
     *
     * @throws NotAvailableException
     */
    public function __unserialize(array $data): void
    {
        throw new NotAvailableException('Cannot unserialize proxy class');
    }

    /**
     * Proxy should not be cloneable.
     *
     * @throws NotAvailableException
     */
    public function __clone()
    {
        throw new NotAvailableException('Cannot clone proxy class');
    }
}
