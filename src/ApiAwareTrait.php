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
            // @phpstan-ignore-next-line : Additional assertion
            return $type !== '';
        }

        // @phpstan-ignore-next-line : Additional assertion
        if (!$type instanceof CType) {
            throw new \TypeError(\sprintf(
                'Type MUST be string|\FFI\CType, but %s passed',
                \get_debug_type($type),
            ));
        }

        return true;
    }

    /**
     * @see ApiInterface::new()
     *
     * @param CType|non-empty-string $type
     *
     * @throws ParserException
     *
     * @phpstan-ignore-next-line : Type expects non-empty string (contravariant)
     */
    public function new($type, bool $owned = true, bool $persistent = false): ?CData
    {
        assert($this->assertTypeArgument($type));

        // @phpstan-ignore-next-line : This is NOT static method
        return $this->ffi->new($type, $owned, $persistent);
    }

    /**
     * @see ApiInterface::cast()
     *
     * @param CType|non-empty-string $type
     * @param CData|int|float|bool|null $ptr
     *
     * @phpstan-ignore-next-line : Type expects non-empty string (contravariant)
     */
    public function cast($type, $ptr): ?CData
    {
        assert($this->assertTypeArgument($type));

        // @phpstan-ignore-next-line : This is NOT static method
        return $this->ffi->cast($type, $ptr);
    }

    /**
     * @see ApiInterface::type()
     *
     * @param non-empty-string $type
     *
     * @phpstan-ignore-next-line : Type expects non-empty string (contravariant)
     */
    public function type(string $type): ?CType
    {
        // @phpstan-ignore-next-line : Additional assertion
        assert($type !== '', 'Type name MUST be not empty');

        // @phpstan-ignore-next-line : This is NOT static method
        return $this->ffi->type($type);
    }
}
