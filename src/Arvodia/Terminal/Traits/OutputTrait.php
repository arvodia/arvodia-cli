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

namespace Arvodia\Terminal\Traits;

/**
 * Description
 * 
 * @name    : Output
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
trait OutputTrait {

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
    protected function showBlock(string $text, string $color = 'BGREEN', bool $centerAlign = false): void {
        $this->screenWidth = $this->screenWidth ?: (preg_match_all("/rows.([0-9]+);.columns.([0-9]+);/", strtolower(exec('stty -a |grep columns')), $output) && sizeof($output) == 3 ? $output[2][0] : 50);
        // $this->screenHeight = $output[1][0];
        $text = implode('', array_map(function ($row) use ($centerAlign) {
                    return str_pad(' ' . $row, $this->screenWidth, " ", $centerAlign ? STR_PAD_BOTH : STR_PAD_RIGHT);
                }, explode(PHP_EOL, $text)));
        echo PHP_EOL . $this->getColor($color) . str_pad(" ", $this->screenWidth, " ", STR_PAD_BOTH) . PHP_EOL . $text . PHP_EOL . str_pad(" ", $this->screenWidth, " ", STR_PAD_BOTH) . PHP_EOL . self::RESET . PHP_EOL . PHP_EOL;
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
        return $color && defined('self::' . ($color = strtoupper($color))) ? constant('self::' . $color) : self::RESET;
    }

    private function getMaxStrlen(array $array): int {
        foreach ($array as $string) {
            $max = max(strlen($string), $max ?? 0);
        }
        return $max;
    }

}
