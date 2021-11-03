<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
     * @psalm-return mixed
     */
    public function __call(string $method, array $args)
    {
        return $this->ffi->$method(...$args);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-return mixed
     */
    public function __get(string $name)
    {
        return $this->ffi->$name;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param mixed $value
     * @psalm-return void
     */
    public function __set(string $name, $value): void
    {
        $this->ffi->$name = $value;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->ffi->$name);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-return bool
     */
    public function __unset(string $name): void
    {
        unset($this->ffi->$name);
    }
}
