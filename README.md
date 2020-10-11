## Обязательные команды

composer install

## Настройки БД
'testing' => [
  'adapter' => 'mysql',
  'host' => 'localhost',
  'name' => 'testing_db',
  'user' => 'root',
  'pass' => '',
  'port' => '3306',
  'charset' => 'utf8',
]

## Обязательные команды
## UNIX
php vendor/bin/phinx migrate
php vendor/bin/phinx seed:run -s UserSeeder

## Windows
vendor\bin\phinx.bat migrate
vendor\bin\phinx.bat seed:run -s UserSeeder

## не обязательно

## UNIX
php vendor/bin/phinx seed:run -s TaskSeeder

## Windows
vendor\bin\phinx.bat seed:run -s TaskSeeder