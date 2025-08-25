<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use DI\Container;
use DI\ContainerBuilder;
use RuntimeException;

/**
 * @author shimomo
 */
final class TrimmerContainer implements TrimmerContainerInterface
{
    /**
     * @var array<non-empty-string, \Boatrace\Ninja\Trimmer\TrimmerContractInterface>
     */
    private static array $instances;

    /**
     * @var \DI\Container|null
     */
    private static ?Container $container;

    /**
     * @param  non-empty-string  $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContractInterface
     * @throws \RuntimeException
     */
    #[\Override]
    public static function getInstance(string $name): TrimmerContractInterface
    {
        $instance = self::getContainer()->get($name);

        if (!$instance instanceof TrimmerContractInterface) {
            throw new RuntimeException(
                'Service \'' . $name . '\' must implement TrimmerContractInterface.'
            );
        }

        return self::$instances[$name] ??= $instance;
    }

    /**
     * @return \DI\Container
     */
    #[\Override]
    public static function getContainer(): Container
    {
        return self::$container ??= (function () {
            $containerBuilder = new ContainerBuilder();
            $containerBuilder->addDefinitions(__DIR__ . '/../config/definitions.php');
            return $containerBuilder->build();
        })();
    }
}
