<?php

/**
 * @author  : Sidi Said Redouane <sidisaidredouane@live.com>
 * @agency  : EURL ARVODIA
 * @email   : arvodia@hotmail.com
 * @project : Webfony
 * @date    : 2021
 * @license : GNU General Public License v3.0
 * @update  : 4 mai 2021
 */

namespace Arvodia\Terminal\Output;

/**
 * Description
 * 
 * @name    : Output
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
class Display {

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

    public function setCommandFullName($name): self {
        $this->commandFullName = $name;
        return $this;
    }

    protected static function SUCCESS() {
        exit(0);
    }

    protected static function FAILURE() {
        exit(1);
    }

    /**
     * 
     * @param type $text
     * @param type $color
     *  - GREEN | RED | YELLOW | CYAN
     * @param string|null $newline
     * @return void
     */
    protected function show($text, $color = null, ?string $newline = PHP_EOL): void {
        echo $this->getColor($color) . $text = preg_replace_callback('#<(green|red|yellow|cyan)>(.+)</(?:green|red|yellow|cyan)>#isU', function ($regs) {
            return $this->getColor($regs[1]) . $regs[2] . self::RESET;
        }, $text = str_replace('%command.full_name%', $this->commandFullName, $text)) . self::RESET . $newline;
    }

    /**
     * 
     * @param string $text
     * @param string $color
     *  - BGREEN | BRED | BBLUE | BPINK
     * @return void
     */
    protected function showBlock(string $text, string $color = 'BGREEN'): void {
        echo PHP_EOL . $this->getColor($color) . str_pad(" ", 50, " ", STR_PAD_BOTH) . PHP_EOL . str_pad($text, 50, " ", STR_PAD_BOTH) . PHP_EOL . str_pad(" ", 50, " ", STR_PAD_BOTH) . PHP_EOL . PHP_EOL . self::RESET . PHP_EOL;
    }

    protected function showList(array $array = [], bool $raw = false, int $level = 0): void {
        foreach ($array as $title => $value) {
            if (!$raw && !$level) {
                echo PHP_EOL;
            }
            if (is_array($value)) {
                if (!$raw) {
                    $this->show(str_repeat(' ', $level * 3) . $title . ':', 'YELLOW');
                }
                $this->showList($value, $raw, $level + 1);
            } else {
                $this->show(($raw ? '' : str_repeat(' ', $level * 3)) . str_pad($title, $pad ?? ($pad = ($this->getMaxStrlen(array_keys($array)) + 2)), " "), $raw ? null : 'GREEN', null);
                $this->show($value);
            }
        }
    }

    private function getColor($color = null): string {
        return defined('self::' . $color = strtoupper($color)) ? constant('self::' . $color) : self::RESET;
    }

    private function getMaxStrlen(array $array): int {
        foreach ($array as $string) {
            $max = max(strlen($string), $max ?? 0);
        }
        return $max;
    }

}
