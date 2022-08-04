<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace FriendsOfTYPO3\FontawesomeProvider;

use Psr\Container\ContainerInterface;
use TYPO3\CMS\Core\Package\AbstractServiceProvider;
use TYPO3\CMS\Core\Package\Cache\PackageDependentCacheIdentifier;

class ServiceProvider extends AbstractServiceProvider
{
    protected static function getPackagePath(): string
    {
        return __DIR__ . '/../';
    }

    protected static function getPackageName(): string
    {
        return 'friendsoftypo3/fontawesome-provider';
    }

    /**
     * @return array<string, callable>
     */
    public function getFactories(): array
    {
        return [
            Imaging\IconProvider\FontawesomeIconProvider::class => [ static::class, 'getFontawesomeIconProvider' ],
        ];
    }

    /**
     * @return array<string, callable>
     */
    public function getExtensions(): array
    {
        return [
            \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class => [ static::class, 'getFontawesomeIconProvider' ],
        ] + parent::getExtensions();
    }

    public static function getFontawesomeIconProvider(ContainerInterface $container): Imaging\IconProvider\FontawesomeIconProvider
    {
        /** @var PackageDependentCacheIdentifier $packageDependentCacheIdentifier */
        $packageDependentCacheIdentifier = $container->get(PackageDependentCacheIdentifier::class);
        return self::new($container, Imaging\IconProvider\FontawesomeIconProvider::class, [
            $container->get('cache.assets'),
            $packageDependentCacheIdentifier->withPrefix('FontawesomeSvgIcons')->toString(),
        ]);
    }
}
