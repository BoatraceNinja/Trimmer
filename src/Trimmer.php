<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

use LogicException;

/**
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseContract
 *     trim(?string $value, ?string $characters = null)
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseContract
 *     ltrim(?string $value, ?string $characters = null)
 * @method static \Boatrace\Ninja\Trimmer\TrimmerResponseContract
 *     rtrim(?string $value, ?string $characters = null)
 * @author shimomo
 */
final class Trimmer implements TrimmerContract
{
    /**
     * @param \Boatrace\Ninja\Trimmer\TrimmerDispatcherContract $trimmer
     */
    public function __construct(private readonly TrimmerDispatcherContract $trimmer)
    {
        //
    }

    /**
     * @param non-empty-string $name
     * @param list<mixed> $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseContract
     * @throws \LogicException
     */
    public function __call(string $name, array $arguments): TrimmerResponseContract
    {
        $response = TrimmerContainer::getContainer()->make(TrimmerResponseContract::class, [
            'value' => $this->trimmer->$name(...$arguments),
        ]);

        if (!$response instanceof TrimmerResponseContract) {
            throw new LogicException(
                sprintf('Expected `%s`, got `%s`.', TrimmerResponseContract::class, get_debug_type($response))
            );
        }

        return $response;
    }

    /**
     * @param non-empty-string $name
     * @param list<mixed> $arguments
     * @return \Boatrace\Ninja\Trimmer\TrimmerResponseContract
     * @throws \LogicException
     */
    public static function __callStatic(string $name, array $arguments): TrimmerResponseContract
    {
        $response = TrimmerContainer::getInstance(TrimmerContract::class)->$name(...$arguments);

        if (!$response instanceof TrimmerResponseContract) {
            throw new LogicException(
                sprintf('Expected `%s`, got `%s`.', TrimmerResponseContract::class, get_debug_type($response))
            );
        }

        return $response;
    }
}
