<?php

/**
 * @author  : Sidi Said Redouane <sidisaidredouane@live.com>
 * @agency  : EURL ARVODIA
 * @email   : arvodia@hotmail.com
 * @project : Webfony
 * @date    : 2021
 * @license : tous droits réservés
 * @update  : 5 mai 2021
 */

/**
 * Description
 * 
 * @name    : Script
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
class Script {

    /**
     * postInstall
     * @param Event $event
     */
    public static function postInstall() {
        if (basename(dirname(__FILE__, 6)) == 'vendor') {
            if (!is_dir(($rootDir = dirname(__FILE__, 7)) . '/bin') && is_writable($rootDir)) {
                mkdir($rootDir . '/bin');
            }
            if (is_dir($rootDir . '/bin') && !is_link($rootDir . '/bin/terminal')) {
                symlink('../vendor/arvodia/arvodia-cli/bin/terminal', $rootDir . '/bin/terminal');
            }
            if (!is_dir($rootDir . '/src') && is_writable($rootDir)) {
                mkdir($rootDir . '/src');
            }
            if (!is_dir($rootDir . '/src/Arvodia') && is_writable($rootDir . '/src')) {
                mkdir($rootDir . '/src/Arvodia/Command', 0755, true);
                if (is_dir($rootDir . '/src/Arvodia/Command') && !is_file($rootDir . '/src/Arvodia/Command/config.json')) {
                    foreach (scandir(dirname(__FILE__, 2) . '/Command') as $file) {
                        if ($file != "." && $file != "..") {
                            copy(dirname(__FILE__, 2) . '/Command/' . $file, $rootDir . '/src/Arvodia/Command/' . $file);
                        }
                    }
                }
            }
        }
    }

}
