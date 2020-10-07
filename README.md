# Creating Simple EE Addons

Some helper files for the workshop given on Oct 7 and Oct 13, 2020

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
