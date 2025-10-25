<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer\Tests;

use BadMethodCallException;
use Boatrace\Ninja\Trimmer\TrimmerCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerCoreTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \Boatrace\Ninja\Trimmer\TrimmerCore
     *
     * @var \Boatrace\Ninja\Trimmer\TrimmerCore
     */
    protected TrimmerCore $trimmer;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->trimmer = new TrimmerCore();
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
    #[DataProviderExternal(TrimmerDataProvider::class, 'trimProvider')]
    public function testTrim(array $arguments, string $expected): void
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
    #[DataProviderExternal(TrimmerDataProvider::class, 'ltrimProvider')]
    public function testLtrim(array $arguments, string $expected): void
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
    #[DataProviderExternal(TrimmerDataProvider::class, 'rtrimProvider')]
    public function testRtrim(array $arguments, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim(...$arguments));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testTrimWithNull(): void
    {
        $this->assertNull($this->trimmer->trim(null));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testLtrimWithNull(): void
    {
        $this->assertNull($this->trimmer->ltrim(null));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testRtrimWithNull(): void
    {
        $this->assertNull($this->trimmer->rtrim(null));
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

        /** @psalm-suppress UndefinedMagicMethod */
        $this->trimmer->ghost();
    }
}
