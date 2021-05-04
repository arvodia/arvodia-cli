<?php

/**
 * @author  : Sidi Said Redouane <sidisaidredouane@live.com>
 * @agency  : EURL ARVODIA
 * @email   : arvodia@hotmail.com
 * @project : Webfony
 * @date    : 2021
 * @license : tous droits réservés
 * @update  : 3 mai 2021
 */
define('DS', DIRECTORY_SEPARATOR);
define('ARVODIA_DIR', __DIR__ . DS);

class Autoloader {

    public static function register() {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DS, $class) . '.php';
            $file = ARVODIA_DIR . $file;
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }

}

Autoloader::register();
?>