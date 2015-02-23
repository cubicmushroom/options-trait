[![Build Status](https://travis-ci.org/cubicmushroom/options-trait.svg)](https://travis-ci.org/cubicmushroom/options-trait)

Options Trait
=============

This trait is used to provide basic options setting, getting, checking, and merging with defaults


Properties
----------

The trait add the following properties to the class...

### $options

An array to the stroe the array of options in.


Methods
-------

The trait adds the following methods to the class...

### hasOption

Returns: boolean

Checks if an option is set or not


### getOption

Returns: mixed

Gets a requested option.

If a second arguments is passed, will return this as the default if the option is not set. If not passed, null is returned.

### setOption

Return: $this

Sets an option value


### setOptions

Return: $this

Sets the options to the values given.

An optional second parameter allows for default values to be passed for options not included in the $options array.