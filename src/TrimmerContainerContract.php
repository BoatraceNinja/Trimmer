<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use DI\Container;

/**
 * @author shimomo
 */
interface TrimmerContainerContract extends TrimmerContract
{
    /**
     * @param non-empty-string $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContract
     */
    public static function getInstance(string $name): TrimmerContract;

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container;
}
