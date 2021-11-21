# Neue Commerce Coding Standards

This repository contains the coding standards followed by Neue Commerce projects.

It includes configuration for:
- [Easy Coding Standard](https://github.com/easy-coding-standard/easy-coding-standard) (`ecs`)
- [PHPStan](https://phpstan.org/) (`phpstan`)
- [Rector](https://getrector.org/) (`rector`)

## Setup

First install the dependency through Composer by running:

```shell
composer require neuecommerce/coding-standards --dev
```

Once the dependency is installed, run the following:

```shell
composer neuecommerce:setup-coding-standards
```

Next open your `composer.json` file and add the following section:

```json
"scripts": {
    "ecs:fix": "./vendor/bin/ecs --fix",
    "ecs:check": "./vendor/bin/ecs",
    "phpstan": "./vendor/bin/phpstan analyse --ansi",
    "rector:fix": "./vendor/bin/rector process --ansi",
    "rector:check": "./vendor/bin/rector process --ansi --dry-run"
},
```

> *Note*: If you already have a `scripts` section on your `composer.json` file, just merge the new scripts with the existing ones.

## Usage

To use it, you can run one of the scripts added to your `composer.json` file:

```shell
composer ecs:fix
composer ecs:check
composer phpstan
composer rector:fix
composer rector:check
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
