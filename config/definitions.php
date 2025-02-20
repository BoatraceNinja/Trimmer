<?php

declare(strict_types=1);

use Boatrace\Ninja\Trimmer\Trimmer;
use Boatrace\Ninja\Trimmer\TrimmerCore;
use Boatrace\Ninja\Trimmer\TrimmerCoreInterface;
use Boatrace\Ninja\Trimmer\TrimmerInterface;
use Boatrace\Ninja\Trimmer\TrimmerResponse;
use Boatrace\Ninja\Trimmer\TrimmerResponseInterface;

return [
    TrimmerInterface::class => \DI\autowire(Trimmer::class)->constructor(\DI\get(TrimmerCoreInterface::class)),
    TrimmerCoreInterface::class => \DI\autowire(TrimmerCore::class),
    TrimmerResponseInterface::class => function (\DI\Container $container, ?string $value = null) {
        return new TrimmerResponse($value);
    },
];
