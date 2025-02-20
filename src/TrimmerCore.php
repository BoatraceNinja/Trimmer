<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use BadMethodCallException;

/**
 * @author shimomo
 */
class TrimmerCore implements TrimmerCoreInterface
{
    /**
     * @var string
     */
    private string $characters = "\x00\x09\x0A\x0B\x0D\x20";

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return never
     *
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments): never
    {
        throw new BadMethodCallException(
            'Call to undefined method \'' . self::class . '::' . $name . '()\'.'
        );
    }

    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function trim(?string $value, ?string $characters = null): ?string
    {
        return is_null($value) ? null : $this->executeTrim($value, $characters);
    }

    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function ltrim(?string $value, ?string $characters = null): ?string
    {
        return is_null($value) ? null : $this->executeLtrim($value, $characters);
    }

    /**
     * @param  string|null  $value
     * @param  string|null  $characters
     * @return string|null
     */
    public function rtrim(?string $value, ?string $characters = null): ?string
    {
        return is_null($value) ? null : $this->executeRtrim($value, $characters);
    }

    /**
     * @param  string       $value
     * @param  string|null  $characters
     * @return string
     */
    private function executeTrim(string $value, ?string $characters): string
    {
        return trim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @param  string       $value
     * @param  string|null  $characters
     * @return string
     */
    private function executeLtrim(string $value, ?string $characters): string
    {
        return ltrim($value, $this->characters . ($characters ?? ''));
    }

    /**
     * @param  string       $value
     * @param  string|null  $characters
     * @return string
     */
    private function executeRtrim(string $value, ?string $characters): string
    {
        return rtrim($value, $this->characters . ($characters ?? ''));
    }
}
