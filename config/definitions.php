<?php

declare(strict_types=1);

use Boatrace\Ninja\Trimmer\Trimmer;
use Boatrace\Ninja\Trimmer\TrimmerContract;
use Boatrace\Ninja\Trimmer\TrimmerDispatcher;
use Boatrace\Ninja\Trimmer\TrimmerDispatcherContract;
use Boatrace\Ninja\Trimmer\TrimmerResponse;
use Boatrace\Ninja\Trimmer\TrimmerResponseContract;

return [
    TrimmerContract::class => \DI\autowire(Trimmer::class)->constructor(\DI\get(TrimmerDispatcherContract::class)),
    TrimmerDispatcherContract::class => \DI\autowire(TrimmerDispatcher::class),
    TrimmerResponseContract::class => function (\DI\Container $container, ?string $value = null) {
        return new TrimmerResponse($value);
    },
];
