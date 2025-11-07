<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerResponseInterface extends TrimmerContractInterface
{
    /**
     * @psalm-return ?string
     *
     * @return ?string
     */
    public function getValue(): ?string;
}
