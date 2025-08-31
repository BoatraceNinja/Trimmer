<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerCoreInterface extends TrimmerContractInterface
{
    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    public function trim(?string $value, ?string $characters = null): ?string;

    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    public function ltrim(?string $value, ?string $characters = null): ?string;

    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    public function rtrim(?string $value, ?string $characters = null): ?string;
}
