# Creating Simple EE Addons

Some helper files for the workshop given on Oct 7 and Oct 13, 2020

## Database

You can work with your existing data for a great deal of this, but for a couple of our use-cases you may want to load the default_db.sql file into your EE installation (although you should certainly be able to follow along even if you do not use it). 

As long as you are running EE 5.3.2, you should be able to simply add a new database to your host, import the data, and change your EE config to point to the new db. You can change it back immediately afterward!

## Helper Files

There's one helper file I've pre-included here, `helpers/parameters_helper.php`, because it's got some *really* complicated stuff going on and it's boilerplate that you shouldn't have to modify. We do have some other functions that are basically boilerplate that we'll be discussing during the workshop, things we'll reuse over and over, but they're less fiddly and we will just walk through them directly.

## Scaffolding

We are using [this EE Scaffolding generator](https://ee-addon-generator.triplenerdscore.xyz) to generate a module, but it is … not perfect. We have to fix some of its settings after creation.

### Generation Options

* Does your module have settings? Check YES
* Include `composer.json` file? Check YES
* Include `.gitignore` file? Check YES

### Fixes After Generating

* In the `upd.[modulename].php` file, set `has_publish_fields` to `'n'`
* In the `mcp.[modulename].php` file, it's invoking the wrong key in the language file; change `lang('[modulename]')` to `lang('[modulename]_module_name')`
* In the `composer.json` file, the `name` of your addon will throw an error if you try to keep it as-is. You need to change it to `[namespace]/[modulename]`, where both parts are legal PHP identifiers (no spaces or special characters)
  * **Suggestion**: Use a consistent namespace across all your custom addons; I use `utilitarienne`
