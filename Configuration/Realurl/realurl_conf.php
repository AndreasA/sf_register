<?php
/***************************************************************
 *  Copyright notice
 *  (c) 2011 Sebastian Fischer <typo3@evoweb.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'])) {
    $register = array(
        'FeUser' => array(
            array(
                'GETvar' => 'tx_sfregister_form[controller]',
                'valueMap' => array(
                    'Creation' => 'FeuserCreate',
                    'Editing' => 'FeuserEdit',
                    'Password' => 'FeuserPassword',
                ),
            ),
            array(
                'GETvar' => 'tx_sfregister_form[action]',
            ),
        ),
        'user' => array(
            array(
                'GETvar' => 'tx_sfregister_form[user]',
            ),
        ),
        'hash' => array(
            array(
                'GETvar' => 'tx_sfregister_form[hash]',
            ),
        ),
        // @deprecated authCode is still there for backward compatibility
        'ac' => array(
            array(
                'GETvar' => 'tx_sfregister_form[authCode]',
            ),
        ),
    );

    foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] as $domain => $config) {
        if (is_array($config)) {
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain]['postVarSets']['_DEFAULT'] = array_merge(
                $register,
                (array) $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain]['postVarSets']['_DEFAULT']
            );
        }

        unset($config);
    }

    unset($register);

    reset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']);
}
