<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PATHS, [
        __DIR__ . '/src'
    ]);
    $parameters->set(Option::AUTOLOAD_PATHS, [
        __DIR__ . '/src'
    ]);
    $parameters->set(Option::EXCLUDE_PATHS, [
        __DIR__ . '/src/runtime',
        __DIR__ . '/src/web',
        __DIR__ . '/vendor'
    ]);

    $parameters->set(Option::SETS, [
        SetList::TYPE_DECLARATION,
        SetList::SOLID,
        SetList::PHP_74,
        SetList::PRIVATIZATION,
        SetList::PERFORMANCE,
        SetList::CODING_STYLE_ADVANCED,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::NAMING,
        SetList::ORDER,
        SetList::DEFLUENT,
        SetList::PHPUNIT_CODE_QUALITY,
    ]);
};
