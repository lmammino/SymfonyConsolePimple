SymfonyConsolePimple
====================

A sample Symfony Console app using Pimple.

It will show how to use [Pimple](http://pimple.sensiolabs.org) in conjunction with [Symfony/Console component](https://github.com/symfony/console) to define commands with a Dependency Injection fashion.

You will find a [full article](http://loige.com/write-a-console-application-using-symfony-and-pimple) on [my blog](http://loige.com).


Usage
-----

Install dependencies with:

```bash
composer install
```

Then you can run

```bash
app/console greet <yourname>
```

or

```bash
app/console greet -Y <yourname>
```

(Obviously put some name instead of *<yourname>* or, if you are too lazy, avoid it at all!)


License
-------

This is not a real software but a sample app, so why bother about a license? Anyway if you really want to bother I suppose
MIT should be enough! ;P


Credits
-------

[Luciano Mammino (loige.com)](http://loige.com)