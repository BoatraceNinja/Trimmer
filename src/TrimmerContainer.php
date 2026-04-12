<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use DI\Container;
use DI\ContainerBuilder;
use RuntimeException;

/**
 * @author shimomo
 */
final class TrimmerContainer implements TrimmerContainerContract
{
    /**
     * @psalm-var array<non-empty-string, \Boatrace\Ninja\Trimmer\TrimmerContract>
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
     * @psalm-return \Boatrace\Ninja\Trimmer\TrimmerContract
     *
     * @param string $name
     * @return \Boatrace\Ninja\Trimmer\TrimmerContract
     * @throws \RuntimeException
     */
    #[\Override]
    public static function getInstance(string $name): TrimmerContract
    {
        $instance = self::getContainer()->get($name);

        if (!$instance instanceof TrimmerContract) {
            throw new RuntimeException(
                sprintf('Expected `%s`, got `%s`.', TrimmerContract::class, get_debug_type($instance))
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
