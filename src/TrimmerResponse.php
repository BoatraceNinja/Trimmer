<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
final class TrimmerResponse implements TrimmerResponseInterface
{
    /**
     * @psalm-param string|null $value
     *
     * @param string|null $value
     */
    public function __construct(private readonly ?string $value = null)
    {
        //
    }

    /**
     * @psalm-return string|null
     *
     * @return string|null
     */
    #[\Override]
    public function getValue(): ?string
    {
        return $this->value;
    }
}
