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

namespace Arvodia\Terminal\Traits;

/**
 * Description
 * 
 * @name    : InPut
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
trait InPutTrait {

    public function confirm(string $question, bool $default = null): bool {
        $answer = null;
        $this->show('<green>' . $question . ' (yes/no)</green> ' . (is_bool($default) ? '[<yellow>' . ($default ? 'yes' : 'no') . '</yellow>]' : '') . ':');
        while (!is_bool($answer)) {
            $this->show('>', null, null);
            $answer = $this->isEnabled(($answer = trim(fgets(STDIN))) === '' ? (is_null($default) ? 'echec' : $default ) : $answer);
            if (!is_bool($answer)) {
                $this->showBlock("The answer is not a Boolean equivalencies,
    To confirm between : '1', 'true', 'on' or 'yes'
    To cancel between  : '0', 'false', 'off' or 'no'", 'BRED');
            }
        }
        return $answer;
    }

    protected function isEnabled($variable) {
        if (!isset($variable)) {
            return null;
        }
        return filter_var($variable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

}
