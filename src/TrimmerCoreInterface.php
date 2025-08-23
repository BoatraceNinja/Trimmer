<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerCoreInterface extends TrimmerContractInterface
{
    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function trim(?string $value, ?string $characters = null): ?string;

    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function ltrim(?string $value, ?string $characters = null): ?string;

    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function rtrim(?string $value, ?string $characters = null): ?string;
}
