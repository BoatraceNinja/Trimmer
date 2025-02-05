<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

/**
 * @author shimomo
 */
class Trimmer implements TrimmerInterface
{
    /**
     * @param  \Boatrace\Ninja\Trimmer\TrimmerCoreInterface  $trimmer
     * @return void
     */
    public function __construct(private readonly TrimmerCoreInterface $trimmer) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     */
    public function __call(string $name, array $arguments): TrimmerResponseInterface
    {
        return TrimmerContainer::getContainer()->make(TrimmerResponseInterface::class, [
            'value' => $this->trimmer->$name(...$arguments),
        ]);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     */
    public static function __callStatic(string $name, array $arguments): TrimmerResponseInterface
    {
        return TrimmerContainer::getInstance(TrimmerInterface::class)->$name(...$arguments);
    }
}
