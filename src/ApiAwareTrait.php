<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Proxy;

use FFI\CData;
use FFI\CType;
use FFI\ParserException;

/**
 * @property-read \FFI $ffi
 * @mixin ApiInterface
 * @psalm-require-implements ApiInterface
 */
trait ApiAwareTrait
{
    /**
     * @see ApiInterface::new()
     * @throws ParserException
     *
     * @psalm-param string|CType $type
     * @psalm-param bool $owned
     * @psalm-param bool $persistent
     * @psalm-return CData|null
     */
    public function new($type, bool $owned = true, bool $persistent = false): ?CData
    {
        return $this->ffi->new($type, $owned, $persistent);
    }

    /**
     * @see ApiInterface::cast()
     *
     * @psalm-param CType|string $type
     * @psalm-param CData|int|float|bool|null $ptr
     * @psalm-return CData|null
     */
    public function cast($type, $ptr): ?CData
    {
        return $this->ffi->cast($type, $ptr);
    }

    /**
     * @see ApiInterface::type()
     *
     * @psalm-param string $type
     * @psalm-return CType|null
     */
    public function type(string $type): ?CType
    {
        return $this->ffi->type($type);
    }
}
