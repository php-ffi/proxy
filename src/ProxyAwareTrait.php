<?php

declare(strict_types=1);

namespace FFI\Proxy;

/**
 * @property-read \FFI $ffi
 */
trait ProxyAwareTrait
{
    /**
     * @param list<mixed> $args
     * @phpstan-return mixed
     */
    public function __call(string $method, array $args)
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($method !== '', 'Method name MUST not be empty');

        // @phpstan-ignore-next-line : Allow dynamic FFI calls
        return $this->ffi->$method(...$args);
    }

    /**
     * @param non-empty-string $name
     * @phpstan-return mixed
     */
    public function __get(string $name)
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($name !== '', 'Property name MUST not be empty');

        // @phpstan-ignore-next-line : Allow dynamic FFI property access
        return $this->ffi->$name;
    }

    /**
     * @param non-empty-string $name
     * @phpstan-param mixed $value
     */
    public function __set(string $name, $value): void
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($name !== '', 'Property name MUST not be empty');

        // @phpstan-ignore-next-line : Allow dynamic FFI property access
        $this->ffi->$name = $value;
    }

    /**
     * @param non-empty-string $name
     */
    public function __isset(string $name): bool
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($name !== '', 'Property name MUST not be empty');

        // @phpstan-ignore-next-line : Allow dynamic FFI property access
        return isset($this->ffi->$name);
    }

    /**
     * @param non-empty-string $name
     */
    public function __unset(string $name): void
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($name !== '', 'Property name MUST not be empty');

        // @phpstan-ignore-next-line : Allow dynamic FFI property access
        unset($this->ffi->$name);
    }
}
