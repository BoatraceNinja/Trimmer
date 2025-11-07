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
     * @psalm-var array<non-empty-string, \Boatrace\Ninja\Trimmer\TrimmerContractInterface>
     *
     * @var array
     */
    private static array $instances;

    /**
     * @psalm-var ?\DI\Container
     *
     * @var ?\DI\Container
     */
    private static ?Container $container;

    /**
     * @psalm-param non-empty-string $name
     * @psalm-return \Boatrace\Ninja\Trimmer\TrimmerContractInterface
     *
     * @param string $name
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
     * @psalm-return \DI\Container
     *
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
