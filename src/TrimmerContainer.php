<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use DI\Container;
use DI\ContainerBuilder;

/**
 * @author shimomo
 */
class TrimmerContainer implements TrimmerContainerInterface
{
    /**
     * @var array
     */
    private static array $instances;

    /**
     * @var \DI\Container
     */
    private static Container $container;

    /**
     * @param  string  $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContractInterface
     */
    public static function getInstance(string $name): TrimmerContractInterface
    {
        return self::$instances[$name] ??= self::getContainer()->get($name);
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        return self::$container ??= (function () {
            $containerBuilder = new ContainerBuilder();
            $containerBuilder->addDefinitions(__DIR__ . '/../config/definitions.php');
            return $containerBuilder->build();
        })();
    }
}
