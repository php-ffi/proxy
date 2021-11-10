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
 * @psalm-type ApiName = class-string<ApiInterface>|non-empty-string
 * @psalm-type ApiImplementation = ApiInterface|\FFI
 */
final class Registry
{
    /**
     * @var string
     */
    private const ERROR_NOT_FOUND = 'The FFI API implementation named "%s" was not registered';

    /**
     * @var string
     */
    private const ERROR_EMPTY_NAME = 'The FFI API implementation name MUST not be empty';

    /**
     * List of FFI API clients
     *
     * @var array<ApiName, ApiImplementation>
     */
    private static array $implementations = [];

    /**
     * Returns FFI API instance by its name or creates a new FFI API instance.
     *
     * @param ApiName $name
     * @return ApiImplementation
     * @throws \OutOfRangeException
     */
    public static function get(string $name): object
    {
        assert($name !== '', self::ERROR_EMPTY_NAME);

        if (isset(self::$implementations[$name])) {
            return self::$implementations[$name];
        }

        if (\is_subclass_of($name, ApiInterface::class, true)) {
            return self::$implementations[$name] = new $name();
        }

        throw new \OutOfRangeException(\sprintf(self::ERROR_NOT_FOUND, $name));
    }

    /**
     * Returns {@see true} if FFI API instance is defined or {@see false} otherwise.
     *
     * @param ApiName $name
     * @return bool
     */
    public static function has(string $name): bool
    {
        assert($name !== '', self::ERROR_EMPTY_NAME);

        return isset(self::$implementations[$name]);
    }

    /**
     * Clean registry storage.
     *
     * @return void
     */
    public static function dispose(): void
    {
        self::$implementations = [];
    }

    /**
     * Register proxy implementation by its name.
     *
     * @param ApiInterface $api
     * @return void
     */
    public static function register(ApiInterface $api): void
    {
        self::$implementations[\get_class($api)] = $api;
    }

    /**
     * Register FFI API implementation bu custom name.
     *
     * @param non-empty-string $name
     * @param ApiImplementation $api
     * @return void
     */
    public static function registerAs(string $name, $api): void
    {
        assert($name !== '', self::ERROR_EMPTY_NAME);

        self::$implementations[$name] = $api;
    }
}
