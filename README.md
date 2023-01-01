# FFI Proxy

<p align="center">
    <a href="https://packagist.org/packages/ffi/proxy"><img src="https://poser.pugx.org/ffi/proxy/require/php?style=for-the-badge" alt="PHP 8.1+"></a>
    <a href="https://packagist.org/packages/ffi/proxy"><img src="https://poser.pugx.org/ffi/proxy/version?style=for-the-badge" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/ffi/proxy"><img src="https://poser.pugx.org/ffi/proxy/v/unstable?style=for-the-badge" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/ffi/proxy"><img src="https://poser.pugx.org/ffi/proxy/downloads?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://raw.githubusercontent.com/php-ffi/proxy/master/LICENSE.md"><img src="https://poser.pugx.org/ffi/proxy/license?style=for-the-badge" alt="License MIT"></a>
</p>
<p align="center">
    <a href="https://github.com/php-ffi/proxy/actions"><img src="https://github.com/php-ffi/proxy/workflows/build/badge.svg"></a>
</p>

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
