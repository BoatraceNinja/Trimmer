<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer\Tests;

use BadMethodCallException;
use Boatrace\Ninja\Trimmer\TrimmerDispatcher;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerDispatcherTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @var \Boatrace\Ninja\Trimmer\TrimmerDispatcher
     */
    protected TrimmerDispatcher $trimmer;

    /**
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->trimmer = new TrimmerDispatcher();
    }

    /**
     * @param non-empty-list<string> $arguments
     * @param string $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(TrimmerDataProvider::class, 'trimProvider')]
    public function trimReturnsTrimmedString(array $arguments, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim(...$arguments));
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
        $this->assertSame($expected, $this->trimmer->ltrim(...$arguments));
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
        $this->assertSame($expected, $this->trimmer->rtrim(...$arguments));
    }

    /**
     * @return void
     */
    #[Test]
    public function trimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->trim(null));
    }

    /**
     * @return void
     */
    #[Test]
    public function ltrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->ltrim(null));
    }

    /**
     * @return void
     */
    #[Test]
    public function rtrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->rtrim(null));
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
        $this->trimmer->ghost();
    }
}
