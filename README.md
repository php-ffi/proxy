# FFI Proxy

A set of classes for creating FFI proxies.

## Requirements

- PHP >= 7.4
- ext-ffi

## Installation

Library is available as composer repository and can be installed using the 
following command in a root of your project.

```sh
$ composer require ffi/proxy
```

## Usage

```php
class Example extends FFI\Proxy\Proxy
{
    public function __construct()
    {
        $this->ffi = \FFI::cdef('...');
    }
}
```
