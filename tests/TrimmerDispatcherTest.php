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
     * @psalm-var \Boatrace\Ninja\Trimmer\TrimmerDispatcher
     *
     * @var \Boatrace\Ninja\Trimmer\TrimmerDispatcher
     */
    protected TrimmerDispatcher $trimmer;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->trimmer = new TrimmerDispatcher();
    }

    /**
     * @psalm-param non-empty-list<string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
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
     * @psalm-param non-empty-list<string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
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
     * @psalm-param non-empty-list<string> $arguments
     * @psalm-param string $expected
     * @psalm-return void
     *
     * @param array $arguments
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
     * @psalm-return void
     *
     * @return void
     */
    #[Test]
    public function trimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->trim(null));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[Test]
    public function ltrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->ltrim(null));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[Test]
    public function rtrimReturnsNullWhenGivenNull(): void
    {
        $this->assertNull($this->trimmer->rtrim(null));
    }

    /**
     * @psalm-return void
     *
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
