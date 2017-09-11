<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'Aliyunoss' => [
            'class' => 'common\Aliyunoss',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
            'itemTable' => 'workspace.auth_item',
            'itemChildTable' => 'workspace.auth_item_child',
            'assignmentTable' => 'workspace.auth_assignment',
            'ruleTable' => 'workspace.auth_rule',
        ],
    ],
];
