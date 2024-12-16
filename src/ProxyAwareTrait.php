<?php

declare(strict_types=1);

namespace FFI\Proxy;

/**
 * @property-read \FFI $ffi
 */
trait ProxyAwareTrait
{
    /**
     * @psalm-param string $method
     * @psalm-param array $args
     *
     * @psalm-return mixed
     */
    public function __call(string $method, array $args)
    {
        assert($method !== '', 'Method name MUST not be empty');

        return $this->ffi->$method(...$args);
    }

    /**
     * @psalm-param non-empty-string $name
     *
     * @psalm-return mixed
     */
    public function __get(string $name)
    {
        assert($name !== '', 'Property name MUST not be empty');

        return $this->ffi->$name;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param mixed $value
     *
     * @psalm-return void
     */
    public function __set(string $name, $value): void
    {
        assert($name !== '', 'Property name MUST not be empty');

        $this->ffi->$name = $value;
    }

    /**
     * @psalm-param non-empty-string $name
     *
     * @psalm-return bool
     */
    public function __isset(string $name): bool
    {
        assert($name !== '', 'Property name MUST not be empty');

        return isset($this->ffi->$name);
    }

    /**
     * @psalm-param non-empty-string $name
     *
     * @psalm-return bool
     */
    public function __unset(string $name): void
    {
        assert($name !== '', 'Property name MUST not be empty');

        unset($this->ffi->$name);
    }
}
