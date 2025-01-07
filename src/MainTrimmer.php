<?php

declare(strict_types=1);

namespace Boatrace\Ninja;

/**
 * @author shimomo
 */
class MainTrimmer
{
    /**
     * @param  string|null  $value
     * @param  string       $characters
     * @return string|null
     */
    public function trim(?string $value, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): ?string
    {
        return is_null($value) ? null : trim($value, $characters);
    }

    /**
     * @param  string|null  $value
     * @param  string       $characters
     * @return string|null
     */
    public function ltrim(?string $value, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): ?string
    {
        return is_null($value) ? null : ltrim($value, $characters);
    }

    /**
     * @param  string|null  $value
     * @param  string       $characters
     * @return string|null
     */
    public function rtrim(?string $value, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): ?string
    {
        return is_null($value) ? null : rtrim($value, $characters);
    }
}
