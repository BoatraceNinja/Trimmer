<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use BadMethodCallException;

/**
 * @author shimomo
 */
final class TrimmerCore implements TrimmerCoreInterface
{
    /**
     * @psalm-var non-empty-string
     *
     * @var string
     */
    private string $characters = "\x00\x09\x0A\x0B\x0D\x20";

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return never
     *
     * @param string $name
     * @param array $arguments
     * @return never
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments): never
    {
        throw new BadMethodCallException(
            'Call to undefined method \'' . self::class . '::' . $name . '()\'.'
        );
    }

    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    #[\Override]
    public function trim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : $this->executeTrim($value, $characters);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    #[\Override]
    public function ltrim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : $this->executeLtrim($value, $characters);
    }

    /**
     * @psalm-param string|null $value
     * @psalm-param string|null $characters
     * @psalm-return string|null
     *
     * @param string|null $value
     * @param string|null $characters
     * @return string|null
     */
    #[\Override]
    public function rtrim(?string $value, ?string $characters = null): ?string
    {
        return $value === null ? null : $this->executeRtrim($value, $characters);
    }

    /**
     * @psalm-param string $value
     * @psalm-param string|null $characters
     * @psalm-return string
     *
     * @param string $value
     * @param string|null $characters
     * @return string
     */
    private function executeTrim(string $value, ?string $characters): string
    {
        return trim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @psalm-param string $value
     * @psalm-param string|null $characters
     * @psalm-return string
     *
     * @param string $value
     * @param string|null $characters
     * @return string
     */
    private function executeLtrim(string $value, ?string $characters): string
    {
        return ltrim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @psalm-param string $value
     * @psalm-param string|null $characters
     * @psalm-return string
     *
     * @param string $value
     * @param string|null $characters
     * @return string
     */
    private function executeRtrim(string $value, ?string $characters): string
    {
        return rtrim($value, $this->characters . ($characters ?? ''));
    }
}
