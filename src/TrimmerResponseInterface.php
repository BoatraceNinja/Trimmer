<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerResponseInterface extends TrimmerContractInterface
{
    /**
     * @psalm-return string|null
     *
     * @return string|null
     */
    public function getValue(): ?string;
}
