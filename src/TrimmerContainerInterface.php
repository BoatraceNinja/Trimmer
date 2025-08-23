<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use DI\Container;

/**
 * @author shimomo
 */
interface TrimmerContainerInterface extends TrimmerContractInterface
{
    /**
     * @param  string  $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContractInterface
     */
    public static function getInstance(string $name): TrimmerContractInterface;

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container;
}
