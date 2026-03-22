<?php

declare(strict_types=1);

use Boatrace\Ninja\Trimmer\Trimmer;
use Boatrace\Ninja\Trimmer\TrimmerDispatcher;
use Boatrace\Ninja\Trimmer\TrimmerDispatcherInterface;
use Boatrace\Ninja\Trimmer\TrimmerInterface;
use Boatrace\Ninja\Trimmer\TrimmerResponse;
use Boatrace\Ninja\Trimmer\TrimmerResponseInterface;

return [
    TrimmerInterface::class => \DI\autowire(Trimmer::class)->constructor(\DI\get(TrimmerDispatcherInterface::class)),
    TrimmerDispatcherInterface::class => \DI\autowire(TrimmerDispatcher::class),
    TrimmerResponseInterface::class => function (\DI\Container $container, ?string $value = null) {
        return new TrimmerResponse($value);
    },
];
