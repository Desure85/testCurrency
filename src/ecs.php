<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PATHS, [
        __DIR__ . './'
    ]);

    $parameters->set(Option::EXCLUDE_PATHS, [
        __DIR__ . 'runtime',
        __DIR__ . 'web',
        __DIR__ . 'vendor',
        __DIR__ . 'tests'
    ]);

    $parameters->set(Option::LINE_ENDING, "\n");
    $parameters->set(Option::SETS, [
        SetList::CLEAN_CODE,
        SetList::PSR_12,
        SetList::ARRAY,
        SetList::COMMON,
        SetList::CONTROL_STRUCTURES,
        SetList::DEAD_CODE,
        SetList::COMMENTS,
        SetList::NAMESPACES,
        SetList::STRICT
    ]);
};
