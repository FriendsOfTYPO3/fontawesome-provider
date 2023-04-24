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
        $GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['fontawesome_provider'] = 'EXT:fontawesome_provider/Resources/Public/Css/fontawesome.css';
    }
})();
