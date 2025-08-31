<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use LogicException;

/**
 * @psalm-method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     trim(?string $value, ?string $characters = null)
 * @psalm-method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     ltrim(?string $value, ?string $characters = null)
 * @psalm-method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     rtrim(?string $value, ?string $characters = null)
 *
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     trim(?string $value, ?string $characters = null)
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     ltrim(?string $value, ?string $characters = null)
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
 *     rtrim(?string $value, ?string $characters = null)
 *
 * @author shimomo
 */
final class Trimmer implements TrimmerInterface
{
    /**
     * @psalm-param \Boatrace\Ninja\Trimmer\TrimmerCoreInterface $trimmer
     *
     * @param \Boatrace\Ninja\Trimmer\TrimmerCoreInterface $trimmer
     */
    public function __construct(private readonly TrimmerCoreInterface $trimmer)
    {
        //
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param array<int, mixed> $arguments
     * @psalm-return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     *
     * @param string $name
     * @param array $arguments
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
     * @psalm-param non-empty-string $name
     * @psalm-param array<int, mixed> $arguments
     * @psalm-return \Boatrace\Ninja\Trimmer\TrimmerResponseInterface
     *
     * @param string $name
     * @param array $arguments
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
