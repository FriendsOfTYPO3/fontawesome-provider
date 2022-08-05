<?php

declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\VersionNumberUtility;

(static function () {
    $typo3VersionNumber = VersionNumberUtility::convertVersionNumberToInteger(
        VersionNumberUtility::getNumericTypo3Version()
    );

    // If TYPO3 version is at least 12
    if ($typo3VersionNumber >= 12000000) {
        // Register as a skin
        $GLOBALS['TBE_STYLES']['skins']['fontawesome_provider']['stylesheetDirectories']['css'] = 'EXT:fontawesome_provider/Resources/Public/Css/';
    }
})();
