<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
class TrimmerResponse implements TrimmerResponseInterface
{
    /**
     * @param  string|null  $value
     * @return void
     */
    public function __construct(private readonly ?string $value = null) {}

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
