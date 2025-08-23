<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
final class TrimmerResponse implements TrimmerResponseInterface
{
    /**
     * @param  string|null  $value
     * @return void
     */
    public function __construct(private readonly ?string $value = null) {}

    /**
     * @return string|null
     */
    #[\Override]
    public function getValue(): ?string
    {
        return $this->value;
    }
}
