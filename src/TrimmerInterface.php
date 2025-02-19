<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerInterface extends TrimmerContractInterface
{
    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     */
    public function __call(string $name, array $arguments): TrimmerResponseInterface;

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     */
    public static function __callStatic(string $name, array $arguments): TrimmerResponseInterface;
}
