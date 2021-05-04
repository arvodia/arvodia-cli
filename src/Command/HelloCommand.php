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

namespace Command;

/**
 * Hello Command
 * 
 * @name    : HelloCommand
 * @see     : 
 * @todo    : 
 *
 * @author Sidi Said Redouane <sidisaidredouane@live.com>
 */
class HelloCommand extends Output {

    protected const DESCRIPTION = 'Hello commands';
    protected const HELP = <<<'EOF'
The <green>hello</green> command run method execute of HelloCommand:

    <green>%command.full_name% </green>

hello help description:
    <green>%command.full_name% -r</green>
EOF;

    /**
     * 
     * @option(param=requise,short=r, message="the parameter requires a value")
     * @option(param=optionnel,short=o, message="parameter value is optional")
     */
    public function execute(string $requise, string $optionnel = 'hello') {
        $this->showBlock($optionnel . ' ' . $requise . '!');
        $this->show($optionnel . ' ' . $requise . '!');
        $array = ['type1' => [
                'val1',
                'val2',
                'val3',
            ], 'type2' => [
                'val1',
                'val2',
                'val3',
        ]];
        $this->showList($array);
    }

}
