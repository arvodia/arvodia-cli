CHANGELOG
=========

1.1.3
-----
* Fix code
* Added Generate command

1.1.2
-----
* Fix show help
* Added Polyfills

1.1.1
-----
* added choice() method for question

1.1.0
-----
* change get verbose, (int) getenv('VERBOSE') to VERBOSE.
* added terminal class, with use InputTrait and OutputTrait
* added InputTrait and OutputTrait trait
* HelloCommand class extends terminal class 
* added confirm() method with "Booleanic" validator
* added screenWidth variable in terminal class
* added $centerAlign Paramertre for Show Block method, default is rightAlign

1.0.7
-----
 * added verbose mode it provides additional details for diagnostic and debugging purposes.
 * added the type of variable for the possibility of optional chaining.
 * add other exception.
 * typing correction and code improvement.
 
1.0.6
-----
 * remove composer scripts post-install-cmd

1.0.5
-----

 * added CHANGELOG.md file
 * rename bin/arvodia to `bin/terminal`
 * autoloader improvement, to auto detect if the installation of new arvodia-cli project or use as a package
 * reorganization of files
 * add the color block in the Display.php class
 * added composer scripts post-install-cmd