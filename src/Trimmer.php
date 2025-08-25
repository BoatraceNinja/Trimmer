<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use LogicException;

/**
 * @author shimomo
 */
final class Trimmer implements TrimmerInterface
{
    /**
     * @param \Boatrace\Ninja\Trimmer\TrimmerCoreInterface  $trimmer
     */
    public function __construct(private readonly TrimmerCoreInterface $trimmer)
    {
        //
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     * @throws \LogicException
     */
    public function __call(string $name, array $arguments): TrimmerResponseInterface
    {
        $response = TrimmerContainer::getContainer()->make(TrimmerResponseInterface::class, [
            'value' => $this->trimmer->$name(...$arguments),
        ]);

        if (!$response instanceof TrimmerResponseInterface) {
            throw new LogicException('Invalid response type.');
        }

        return $response;
    }

    /**
     * @param  non-empty-string   $name
     * @param  array<int, mixed>  $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     * @throws \LogicException
     */
    public static function __callStatic(string $name, array $arguments): TrimmerResponseInterface
    {
        $response = TrimmerContainer::getInstance(TrimmerInterface::class)->$name(...$arguments);

        if (!$response instanceof TrimmerResponseInterface) {
            throw new LogicException('Invalid response type.');
        }

        return $response;
    }
}
