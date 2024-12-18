<?php

declare(strict_types=1);

namespace FFI\Proxy;

use FFI\CData;
use FFI\CType;
use FFI\ParserException;

interface ApiInterface
{
    /**
     * @see \FFI::new()
     *
     * @param string|CType $type
     *
     * @throws ParserException
     */
    public function new($type, bool $owned = true, bool $persistent = false): ?CData;

    /**
     * @see \FFI::cast()
     *
     * @param CType|string $type
     * @param CData|int|float|bool|null $ptr
     */
    public function cast($type, $ptr): ?CData;

    /**
     * @see \FFI::type()
     */
    public function type(string $type): ?CType;
}
