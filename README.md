<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

Шаблон содержит основные функции, включая вход / выход пользователя и страницу контактов.
Он включает в себя все часто используемые конфигурации, которые позволят вам сосредоточиться на добавлении новых
функции вашего приложения.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

ФАЙЛОВАЯ СТРУКТУРА
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         компоненты фреймворка для dependency injection
      config/             contains application configurations
      controllers/        contains Web controller classes
      extensions/         классы, расширяющие базовый функционал
      migratios/          миграции БД
      providers/          провайдеры данных
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



ЗАВИСИМОВСТИ
------------

Минимальное требование этого шаблона проекта, чтобы ваш веб-сервер поддерживал PHP 5.6.0.


УСТАНОВКА
------------

1. Установить зависимости composer
   ```
   composer install
   ```
   
2. Применить миграции для БД 
   ```
   php yii artisan migrate
   ```
3. Настроить Crone на ручку /rate/update с интервалом временил, либо оставить как есть.


КОНФИГУРАЦИЯ
-------------

### БД

Создать файл `config/db.local.php` для работы с реальной БД, для примера есть `config/db.example.php`:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```


ТЕСТИРОВАНИЕ
-------

Для тестирования приложения можно запустить команду 
```
   php yii fixture/load "*"
```

