# Kaataa - PHP

Improve your programming skills by solving exercises. Verify your solutions with unit tests.

## What is a Kata?

If you don't know what it is, you can [check this beautiful repo](https://github.com/gamontal/awesome-katas#introduction)

## What is Kaataa?

Kaataa is a PHP open source project inspired heavily in simplicity of Laravel, which is used to start immediately, without having to do any previous configuration.

It is preloaded with:

- PHPUnit
- Mockery

Of course, it's also has the **dd** helper (from Symfony, to Laravel), for easy debugging while you get fun on it.


### How to use?

Create a Kata quickly! A Class and a Test will be created
```sh
php dojo create:kata {NameOfYourkata}
```

Or, maybe... Do you just want to make a class? No problem
```sh
php dojo make:class {ClassName}
```

Did you say only a test? Sure
```sh
php dojo make:test {Test}
```

### Installation

```sh
composer create-project sebacarrasco93/kaataa your-name
```

### Run your tests
```sh
vendor/bin/phpunit
```
