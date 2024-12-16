<?php

declare(strict_types=1);

namespace FFI\Proxy;

use FFI\CData;
use FFI\CType;
use FFI\ParserException;

/**
 * @property-read \FFI $ffi
 *
 * @psalm-require-implements ApiInterface
 *
 * @mixin ApiInterface
 */
trait ApiAwareTrait
{
    /**
     * @param non-empty-string|CType $type
     */
    private function assertTypeArgument($type): bool
    {
        if (\is_string($type)) {
            return $type !== '';
        }

        if (!$type instanceof CType) {
            throw new \TypeError(
                \sprintf('Type MUST be string|\FFI\CType, but %s passed', \get_debug_type($type))
            );
        }

        return true;
    }

    /**
     * @see ApiInterface::new()
     *
     * @throws ParserException
     *
     * @psalm-param CType|non-empty-string $type
     * @psalm-param bool $owned
     * @psalm-param bool $persistent
     *
     * @psalm-return CData|null
     */
    public function new($type, bool $owned = true, bool $persistent = false): ?CData
    {
        assert($this->assertTypeArgument($type));

        return $this->ffi->new($type, $owned, $persistent);
    }

    /**
     * @see ApiInterface::cast()
     *
     * @psalm-param CType|non-empty-string $type
     * @psalm-param CData|int|float|bool|null $ptr
     *
     * @psalm-return CData|null
     */
    public function cast($type, $ptr): ?CData
    {
        assert($this->assertTypeArgument($type));

        return $this->ffi->cast($type, $ptr);
    }

    /**
     * @see ApiInterface::type()
     *
     * @psalm-param non-empty-string $type
     *
     * @psalm-return CType|null
     */
    public function type(string $type): ?CType
    {
        assert($type !== '', 'Type name MUST be not empty');

        return $this->ffi->type($type);
    }
}
