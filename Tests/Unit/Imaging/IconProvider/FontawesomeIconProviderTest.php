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

namespace TYPO3\CMS\Core\Tests\Unit\Imaging\IconProvider;

use FriendsOfTYPO3\FontawesomeProvider\Imaging\IconProvider\FontawesomeIconProvider;
use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Core\Imaging\Icon;

class FontawesomeIconProviderTest extends TestCase
{
    protected ?FontawesomeIconProvider $subject;
    protected Icon $icon;

    protected function setUp(): void
    {
        parent::setUp();

        $cacheMock = $this->createMock(FrontendInterface::class);
        $cacheMock->method('get')->willReturn([]);

        $this->subject = new FontawesomeIconProvider($cacheMock, 'FontawesomeSvgIcons');
        $this->icon = new Icon();
        $this->icon->setIdentifier('foo');
        $this->icon->setSize(Icon::SIZE_SMALL);
    }

    /**
     * @test
     */
    public function prepareIconMarkupWithNameReturnsInstanceOfIconWithCorrectMarkup(): void
    {
        $this->subject->prepareIconMarkup($this->icon, ['name' => 'times']);
        self::assertEquals('<span class="icon-unify"><i class="fa fa-times"></i></span>', $this->icon->getMarkup());
    }

    /**
     * DataProvider for icon names
     *
     * @return array<string, array<int, string|int>>
     */
    public static function wrongNamesDataProvider(): array
    {
        return [
            'name with spaces' => ['name with spaces', 1440754979],
            'name with spaces and umlauts' => ['name with spaces äöü', 1440754979],
            'name umlauts' => ['häuser', 1440754979],
            'name with underscore' => ['name_with_underscore', 1440754979],
            'name is empty' => ['', 1440754978],
        ];
    }

    /**
     * @dataProvider wrongNamesDataProvider
     * @param string $name
     * @param int $expectedExceptionCode
     * @test
     */
    public function prepareIconMarkupWithInvalidNameThrowsException(string $name, int $expectedExceptionCode): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode($expectedExceptionCode);

        $this->subject->prepareIconMarkup($this->icon, ['name' => $name]);
    }
}
