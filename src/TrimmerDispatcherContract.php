<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerDispatcherContract extends TrimmerContract
{
    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    public function trim(?string $value, ?string $characters = null): ?string;

    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    public function ltrim(?string $value, ?string $characters = null): ?string;

    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    public function rtrim(?string $value, ?string $characters = null): ?string;
}
