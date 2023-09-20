<p align="center"><a href="https://github.com/sebacarrasco93/kaataa" target="_blank"><img src="https://res.cloudinary.com/super-admin/image/upload/v1695245597/php-packages/kaataa/Kaataa_v1.0.0.png" width="400"></a></p>

# Kaataa

Improve your programming skills by solving exercises. Verify your solutions with unit tests.

## What is a Kata?

If you don't know what it is, you can look at this cool [introduction](https://github.com/gamontal/awesome-katas#introduction)

## What is Kaataa?

Kaataa is a PHP open source scaffolding project inspired heavily in simplicity of [Laravel](https://laravel.com), which is used to kick start immediately, without having to do anything extra.

It is supercharged with:

- [x] PHPUnit
- [x] Mockery
- [ ] Pest (soon)

Of course, it's also has the **dd** helper from [Symfony](https://symfony.com) for easy debugging while you get fun on it.

### How to use?

Create a Kata quickly! A Class and a Test will be created

```sh
php dojo create:kata {NameOfYourKata}
```

Or, maybe... Do you just want to make a class? No problem

```sh
php dojo make:class {ClassName}
```

Only a test? Of course

```sh
php dojo make:test {TestName}
```

### Requirements

- [x] PHP 8.1 or greater
- [x] Composer 2

### Installation

```sh
composer create-project sebacarrasco93/kaataa example-kata
```

### Run tests

From composer (easier)

```sh
composer test
```

PHPUnit

```sh
./vendor/bin/phpunit
```
