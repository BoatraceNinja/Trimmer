<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
final class TrimmerResponse implements TrimmerResponseInterface
{
    /**
     * @psalm-param ?string $value
     *
     * @param ?string $value
     */
    public function __construct(private readonly ?string $value = null)
    {
        //
    }

    /**
     * @psalm-return ?string
     *
     * @return ?string
     */
    #[\Override]
    public function getValue(): ?string
    {
        return $this->value;
    }
}
