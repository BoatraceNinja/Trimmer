<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer\Tests;

/**
 * @author shimomo
 */
final class TrimmerDataProvider
{
    /**
     * @return non-empty-list<array{
     *     arguments: non-empty-list<string>,
     *     expected: string,
     * }>
     */
    public static function trimProvider(): array
    {
        return [
            ['arguments' => [' 競艇 '], 'expected' => '競艇'],
            ['arguments' => [' 競艇 ', '競'], 'expected' => '艇'],
            ['arguments' => [' 競艇 ', '艇'], 'expected' => '競'],
            ['arguments' => [' 競艇 ', '競艇'], 'expected' => ''],
            ['arguments' => [' @競艇@ ', "\x40"], 'expected' => '競艇'],
            ['arguments' => [' ＠競艇＠ ', "\x40"], 'expected' => '＠競艇＠'],
            ['arguments' => [' @競艇 ', "\x40"], 'expected' => '競艇'],
            ['arguments' => [' ＠競艇 ', "\x40"], 'expected' => '＠競艇'],
            ['arguments' => [' 競艇@ ', "\x40"], 'expected' => '競艇'],
            ['arguments' => [' 競艇＠ ', "\x40"], 'expected' => '競艇＠'],
        ];
    }

    /**
     * @return non-empty-list<array{
     *     arguments: non-empty-list<string>,
     *     expected: string,
     * }>
     */
    public static function ltrimProvider(): array
    {
        return [
            ['arguments' => [' 競艇 '], 'expected' => '競艇 '],
            ['arguments' => [' 競艇 ', '競'], 'expected' => '艇 '],
            ['arguments' => [' 競艇 ', '艇'], 'expected' => '競艇 '],
            ['arguments' => [' 競艇 ', '競艇'], 'expected' => ''],
            ['arguments' => [' @競艇@ ', "\x40"], 'expected' => '競艇@ '],
            ['arguments' => [' ＠競艇＠ ', "\x40"], 'expected' => '＠競艇＠ '],
            ['arguments' => [' @競艇 ', "\x40"], 'expected' => '競艇 '],
            ['arguments' => [' ＠競艇 ', "\x40"], 'expected' => '＠競艇 '],
            ['arguments' => [' 競艇@ ', "\x40"], 'expected' => '競艇@ '],
            ['arguments' => [' 競艇＠ ', "\x40"], 'expected' => '競艇＠ '],
        ];
    }

    /**
     * @return non-empty-list<array{
     *     arguments: non-empty-list<string>,
     *     expected: string,
     * }>
     */
    public static function rtrimProvider(): array
    {
        return [
            ['arguments' => [' 競艇 '], 'expected' => ' 競艇'],
            ['arguments' => [' 競艇 ', '競'], 'expected' => ' 競艇'],
            ['arguments' => [' 競艇 ', '艇'], 'expected' => ' 競'],
            ['arguments' => [' 競艇 ', '競艇'], 'expected' => ''],
            ['arguments' => [' @競艇@ ', "\x40"], 'expected' => ' @競艇'],
            ['arguments' => [' ＠競艇＠ ', "\x40"], 'expected' => ' ＠競艇＠'],
            ['arguments' => [' @競艇 ', "\x40"], 'expected' => ' @競艇'],
            ['arguments' => [' ＠競艇 ', "\x40"], 'expected' => ' ＠競艇'],
            ['arguments' => [' 競艇@ ', "\x40"], 'expected' => ' 競艇'],
            ['arguments' => [' 競艇＠ ', "\x40"], 'expected' => ' 競艇＠'],
        ];
    }
}
