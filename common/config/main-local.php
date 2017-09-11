<?php
return [
    'components' => [
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=maimaibao',
            //'username' => 'maimaibao_reads',
            //'password' => '308a2efa87020d75667b1696af72e086',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=workspace',
            'username' => 'root',
            //'password' => '2EE6EA13-8D5E-4C34-8F94-CDD65B35E696',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'bootstrap' => ['gii'],
    'modules' => [
        'gii'=>[
            'class' => 'yii\gii\Module',
            //自定义允许访问gii模块的ip或者ip段
            'allowedIPs' => ['127.0.0.1']
        ]
    ],
];
