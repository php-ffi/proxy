<?php

namespace PHPSTORM_META {

    override(\FFI\Proxy\Registry::get(), type(0));

    registerArgumentsSet('ProxyCType',
        'void *',

        'bool',

        'float',
        'double',
        'long double',

        'char',
        'signed char',
        'unsigned char',
        'int',
        'signed int',
        'unsigned int',
        'long',
        'signed long',
        'unsigned long',
        'long long',
        'signed long long',
        'unsigned long long',

        'intptr_t',
        'uintptr_t',
        'size_t',
        'ssize_t',
        'ptrdiff_t',
        'off_t',
        'va_list',
        '__builtin_va_list',
        '__gnuc_va_list',

        // stdint.h
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
    );

    expectedArguments(\FFI\Proxy\ApiInterface::new(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\ApiInterface::cast(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\ApiInterface::type(), 0, argumentsSet('ProxyCType'));

    expectedArguments(\FFI\Proxy\ApiAwareTrait::new(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\ApiAwareTrait::cast(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\ApiAwareTrait::type(), 0, argumentsSet('ProxyCType'));

    expectedArguments(\FFI\Proxy\Proxy::new(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\Proxy::cast(), 0, argumentsSet('ProxyCType'));
    expectedArguments(\FFI\Proxy\Proxy::type(), 0, argumentsSet('ProxyCType'));

}
