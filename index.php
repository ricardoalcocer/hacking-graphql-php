<?php
    require('vendor/autoload.php');
    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'mysql.ricardoalcocer.com',
        'database'  => 'graphqldemo',
        'username'  => 'graphqldemo',
        'password'  => 'GQLDemo!',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    echo "DB Setup Done";