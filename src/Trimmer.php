<?php

declare(strict_types=1);

namespace Boatrace\Ninja;

use DI\Container;
use DI\ContainerBuilder;

/**
 * @author shimomo
 */
class Trimmer
{
    /**
     * @var \Boatrace\Ninja\Trimmer
     */
    protected static Trimmer $instance;

    /**
     * @var \DI\Container
     */
    protected static Container $container;

    /**
     * @param  \Boatrace\Ninja\MainTrimmer  $trimmer
     * @return void
     */
    public function __construct(protected MainTrimmer $trimmer){}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|null
     */
    public function __call(string $name, array $arguments): ?string
    {
        return $this->trimmer->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|null
     */
    public static function __callStatic(string $name, array $arguments): ?string
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @return \Boatrace\Ninja\Trimmer
     */
    public static function getInstance(): Trimmer
    {
        return self::$instance ?? self::$instance = (
            self::$container ?? self::$container = self::getContainer()
        )->get('Trimmer');
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
        return $builder->build();
    }
}
