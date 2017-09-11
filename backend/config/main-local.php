<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'eaWaiU6vqXRxP4KLYVFn8QyZ3Ikp93T8',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    //$config['bootstrap'][] = 'gii';
    /*$config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        //自定义允许访问gii模块的ip或者ip段
        'allowedIPs' => ['127.0.0.1']
    ];*/
}

return $config;
