<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer\Tests;

use BadMethodCallException;
use Boatrace\Ninja\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerTest extends TestCase
{
    /**
     * @psalm-param array<int, string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param string $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerDataProvider::class, 'trimProvider')]
    public function testTrim(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::trim(...$arguments)->getValue());
    }

    /**
     * @psalm-param array<int, string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param string $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerDataProvider::class, 'ltrimProvider')]
    public function testLtrim(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim(...$arguments)->getValue());
    }

    /**
     * @psalm-param array<int, string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param string $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerDataProvider::class, 'rtrimProvider')]
    public function testRtrim(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim(...$arguments)->getValue());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testTrimWithNull(): void
    {
        $this->assertNull(Trimmer::trim(null)->getValue());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testLtrimWithNull(): void
    {
        $this->assertNull(Trimmer::ltrim(null)->getValue());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testRtrimWithNull(): void
    {
        $this->assertNull(Trimmer::rtrim(null)->getValue());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Call to undefined method \'Boatrace\Ninja\Trimmer\TrimmerCore::ghost()\'.'
        );

        Trimmer::ghost();
    }
}
