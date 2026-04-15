<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use BadMethodCallException;

/**
 * @author shimomo
 */
final class TrimmerDispatcher implements TrimmerDispatcherContract
{
    /**
     * @var non-empty-string
     */
    private string $characters = "\x00\x09\x0A\x0B\x0D\x20";

    /**
     * @param non-empty-string $name
     * @param list<mixed> $arguments
     * @return never
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments): never
    {
        throw new BadMethodCallException(
            'Call to undefined method `' . self::class . '::' . $name . '()`.'
        );
    }

    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    #[\Override]
    public function trim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : trim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    #[\Override]
    public function ltrim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : ltrim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @param ?string $value
     * @param ?string $characters
     * @return ?string
     */
    #[\Override]
    public function rtrim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : rtrim($value, $this->characters . ($characters ?? ''));
    }
}
