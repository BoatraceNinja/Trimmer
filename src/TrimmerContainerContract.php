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
     * @psalm-param non-empty-string $name
     * @psalm-return \Boatrace\Ninja\Trimmer\TrimmerContract
     *
     * @param string $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContract
     */
    public static function getInstance(string $name): TrimmerContract;

    /**
     * @psalm-return \DI\Container
     *
     * @return \DI\Container
     */
    public static function getContainer(): Container;
}
