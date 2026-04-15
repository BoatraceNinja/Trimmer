<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer\Tests;

use BadMethodCallException;
use Boatrace\Ninja\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerTest extends TestCase
{
    /**
     * @param non-empty-list<string> $arguments
     * @param string $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(TrimmerDataProvider::class, 'trimProvider')]
    public function trimReturnsTrimmedString(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::trim(...$arguments)->getValue());
    }

    /**
     * @param non-empty-list<string> $arguments
     * @param string $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(TrimmerDataProvider::class, 'ltrimProvider')]
    public function ltrimReturnsTrimmedString(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim(...$arguments)->getValue());
    }

    /**
     * @param non-empty-list<string> $arguments
     * @param string $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(TrimmerDataProvider::class, 'rtrimProvider')]
    public function rtrimReturnsTrimmedString(array $arguments, string $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim(...$arguments)->getValue());
    }

    /**
     * @return void
     */
    #[Test]
    public function trimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull(Trimmer::trim(null)->getValue());
    }

    /**
     * @return void
     */
    #[Test]
    public function ltrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull(Trimmer::ltrim(null)->getValue());
    }

    /**
     * @return void
     */
    #[Test]
    public function rtrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull(Trimmer::rtrim(null)->getValue());
    }

    /**
     * @return void
     */
    #[Test]
    public function throwsBadMethodCallExceptionWhenCallingUndefinedMethod(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Call to undefined method `Boatrace\Ninja\Trimmer\TrimmerDispatcher::ghost()`.'
        );

        /** @psalm-suppress UndefinedMagicMethod */
        Trimmer::ghost();
    }
}
