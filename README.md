![EURL ARVODIA Logo](https://raw.githubusercontent.com/arvodia/src/main/arvodia-logo.png)
# ARVODIA CLI Tools
The Arvodia CLI Tools makes it easy to create command line interfaces.

 - [Feature](#feature)
 - [Installation](#installation)
 - [Commands](#commands)
 - [Example](#example)
 - [Annotations](#annotations)
   - [Syntax](#syntax)
 - [Input Arguments](#input-arguments)
 - [Configuration](#configuration)
 - [Git clone](#git-clone)
 - [Contact](#contact)
 - [License](#license)

## Feature
  - a single executable file, or with load class
  - a method for a command.
  - the input options are injected into the parameters of the function
  - support variable annotation for description and shorcut
  - the longname input are the same as the name of the function parameters
  - validation of the required value
  - also other verification such as the command name which does not exist
  - compare the type of option input with the variables of the function parameters
  - the possibility of optional chaining, example: -abc
  - decoration the text output color, block and list
  - list command lists all commands:
  - help option display help for the given command.
  - verbose level option, example : -v -vv -vvv
  - command description, usage and help
  - confirm and choice input

## Screenshot
![EURL ARVODIA Logo](https://raw.githubusercontent.com/arvodia/src/main/arvodia-cli-screenshot.png)

## Installation
You can [download](https://github.com/arvodia/arvodia-cli/tree/main/bin "download") only the bin file and work with it, or integrate arvodia-cli into your project with composer.
````
composer require arvodia/arvodia-cli
mkdir -p src/Arvodia
cp -r vendor/arvodia/arvodia-cli/src/Arvodia/Command/ src/Arvodia/
ln -s ../vendor/arvodia/arvodia-cli/bin/terminal bin/app_name
````
to execute
````
php bin/app_name
````

## Commands
Class Commands can be integrated directly in the `bin/terminal` file, if you want to use a single file for your executable.

You can also create PHP files in the `src/Arvodia/Command` folder, the files must be suffixed with Command, for example `NameCommand.php`, with a class of the same name as the file, 
the commands is automatically detected by arvodia-cli.

The class must also contain an `execute()` method, the options passed in the command line will be injected into the parameters of the `execute()` function. 

## Example
````
class ExampleCommand extends ArvodiaCli {
    protected const DESCRIPTION = 'Example commands';
    protected const HELP = 'HELP commands text';
    /**
     * 
     * @option(param=requise,short=r, message="the parameter requires a value")
     * @option(param=optionnel,short=o, message="parameter value is optional")
     */
    public function execute(string $requise, string $optionnel = 'hello')
	{
        $this->show($optionnel . ' ' . $requise . '!');
		$this->show('Verbosity levels is : ' . VERBOSE);
    }
}
````

## Annotations
Annotations are optional, it serves to add a shortcut for your option and a description.

### Syntax
It must be placed in `@option()`, and it is necessary to declare the `param` that contains the name of the variable in the parameters of your `execute` method 

## Input Arguments
The name of the first argument to find is the name of the command to execute
Note:
it can be placed at the beginning or in the middle or at the end.

 * A parameter without a default value (the parameter requires a value) // required value
   * Note: If a value is required, it doesn't matter which string it next assigns to it.
 * A parameter with default value (the parameter value is optional)
   * Note: Optional values do not accept space as a separator.
 * A parameter with type bool, boolean:
   * These options do not accept any value if there is a default value, it will just revert to true if it is found.
   * With required value, These options accept the values "1", "true", "on", "yes", "0", "false", "off" and "no"
   * Possible multiple short name with a default value, example -abc
  
Note:
  The script will stop when the first bad option is found. 

## Configuration
To customize the title of the console introduction, modify the `arvodia_cli_title` key in the `Command/config.json` file

## Git clone
```
$ git clone https://github.com/arvodia/arvodia-cli.git
```

## Contact
[arvodia@hotmail.com](mailto:arvodia@hotmail.com) - EURL ARVODIA

## License
GNU General Public License v3.0
