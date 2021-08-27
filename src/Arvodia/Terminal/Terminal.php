<?php

/**
 * @author  : Sidi Said Redouane <sidisaidredouane@live.com>
 * @agency  : EURL ARVODIA
 * @email   : arvodia@hotmail.com
 * @project : Webfony
 * @date    : 2021
 * @license : tous droits réservés
 * @update  : 6 mai 2021
 */

namespace Arvodia\Terminal;

use Arvodia\Terminal\Traits\InputTrait;
use Arvodia\Terminal\Traits\OutputTrait;

/**
 * Description
 * 
 * @name    : Terminal
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
class Terminal {

    use InputTrait;
    use OutputTrait;

    protected $commandFullName;

    private const GREEN = "\033[0;32m";
    private const RED = "\033[0;31m";
    private const YELLOW = "\033[1;33m";
    private const CYAN = "\033[0;36m";
    private const BGREEN = "\033[42;1;30m";
    private const BRED = "\033[41;1;37m";
    private const BBLUE = "\033[44;1;37m";
    private const BPINK = "\033[45;1;37m";
    private const RESET = "\033[0m";
    private $screenWidth;

}
