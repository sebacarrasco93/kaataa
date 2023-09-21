<p align="center"><a href="https://github.com/sebacarrasco93/kaataa" target="_blank"><img src="https://res.cloudinary.com/super-admin/image/upload/v1695245597/php-packages/kaataa/Kaataa_v1.0.0.png" width="400"></a></p>

# Kaataa

😎 Improve your programming skills by solving challenges

✅ Verify your solutions with Unit Tests

💡 A really good start point to understanding TDD

## What is a Kata?

In programming, a kata is an exercise which helps you to enhance skills through practice and repetition.

If you want more information, please check [Awesome Katas](https://github.com/gamontal/awesome-katas#introduction).

## Why Kaataa?

Kaataa is a open source project heavily inspired in simplicity of [Laravel](https://laravel.com). With Kaataa, you can take advantage from Unit Tests.

It is supercharged with:

- [x] PHPUnit
- [x] Mockery
- [ ] Pest (soon)

Of course, it's also has the **dd** helper from [Symfony](https://symfony.com) for easy debugging while you get fun on it.

## Quick start

Automatically create Class and Test files

```sh
php dojo create:kata {NameOfYourKata}
```

## Another commands

Want to make a only a class? No problem

```sh
php dojo make:class {ClassName}
```

Only a test? Of course

```sh
php dojo make:test {TestName}
```

## Requirements

- [x] PHP 8.1 or greater
- [x] Composer 2

## Installation

```sh
composer create-project sebacarrasco93/kaataa {your_project_name}
```

## Run tests

From composer (easier)

```sh
composer test
```

PHPUnit

```sh
./vendor/bin/phpunit
```
