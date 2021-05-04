![EURL ARVODIA Logo](https://raw.githubusercontent.com/arvodia/src/main/arvodia-logo.png)
# ARVODIA CLI Tools
The Arvodia CLI Tools makes it easy to create command line interfaces.

## Commands :
Class Commands can be integrated directly in the bin/arvodia file, if you want to use a single file for your executable.

You can also create PHP files Content Class Class in the src/Arvodia/Command/ folder, suffixed files with `Command` : CommandnameCommand.php, the class is automatically detected by arvodia-cli.

The names of the class must also be suffixed by `Command`.

The class must also contain a method call `execute()`, the options pass in the command line they will be injecting into the parameters of the `execute()` function.

## Example :

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
    }
}
````

## Annotations :
Annotations are optional, it serves to add a shortcut for your option and a description.

### Syntax :

It must be placed in `@option()`, and it is necessary to declare the `param` that contains the name of the variable in the parameters of your `execute` method 

## Arguments :
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

## Git clone :
```
$ git clone https://github.com/arvodia/arvodia-cli.git
```

## Contact :
[arvodia@hotmail.com](mailto:arvodia@hotmail.com) - EURL ARVODIA

## License :
GNU General Public License v3.0