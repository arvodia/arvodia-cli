<?php

/**
 * @author  : Sidi Said Redouane <sidisaidredouane@live.com>
 * @agency  : EURL ARVODIA
 * @email   : arvodia@hotmail.com
 * @project : Webfony
 * @date    : 2021
 * @license : GNU General Public License v3.0
 * @update  : 3 mai 2021
 */
define('DS', DIRECTORY_SEPARATOR);

class Autoloader {

    public static function register() {
        if (($commandsDir = realpath(__DIR__ . '/../../../../../src/Arvodia/Command')) ||
                ($commandsDir = realpath(__DIR__ . '/Command'))) {
            $srcDir = substr($commandsDir, 0, -15);
            spl_autoload_register(function ($class) use ($srcDir) {
                if (file_exists($file = (str_starts_with($class, 'Arvodia\Command') ? $srcDir : dirname(__DIR__) . DS ) . str_replace('\\', DS, $class) . '.php')) {
                    require $file;
                    return true;
                }
                return false;
            });
        }
        return $commandsDir;
    }

}
