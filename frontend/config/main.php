<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        $params['domain']['www'] . '/js/jquery-2.1.1.js',
                    ]
                ],
                'yii\grid\GridViewAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        $params['domain']['www'] . '/js/yii.gridView.js',
                    ]
                ],
                'yii\validators\ValidationAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        $params['domain']['www'] . '/js/yii.validation.js',
                    ]
                ],
                'yii\widgets\ActiveFormAsset' => [
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/yii.activeForm.js',
                    ]
                ],
                'yii\web\YiiAsset'=> [
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/yii.js',
                    ]
                ],
                'yii\captcha\CaptchaAsset'=> [
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/yii.captcha.js',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' =>[
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/bootstrap.min.js',
                    ],
                    'css' => [
                        $params['domain']['www'] . '/css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' =>[
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/bootstrap.min.js',
                    ],
                ],
                'yii\bootstrap\BootstrapThemeAsset' =>[
                    'sourcePath' => null,   // 一定不要发布该资源
                    'css' => [
                        $params['domain']['www'] . '/css/bootstrap-theme.css',
                    ]
                ],
                'yii\gii\GiiAsset' => [
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        $params['domain']['www'] . '/js/gii.js',
                    ],
                ],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',//允许访问的节点，可自行添加
            'admin/*',//允许所有人访问admin节点及其子节点
        ]
    ],
    'params' => $params,
];
