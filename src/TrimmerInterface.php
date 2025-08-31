<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Trimmer;

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
interface TrimmerInterface extends TrimmerContractInterface
{
    //
}
