    'modules'    => [
        'translator' => [
            'class' => 'infun3\translator\Module',
        ],
         'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['admin'],
        ],
    ],
    'components' => [
         'translate' => [
            'class' => 'wfstudioru\translate\Translation',
            'key' => 'INSERT-YOUR-API-KEY',
        ],
    ],
    

    php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
     php yii migrate/up --migrationPath=@vendor/infun3/translator/migrations
https://github.com/wfstudioru/yii2-yandex-translate-api
https://github.com/dektrium/yii2-user/blob/master/docs/getting-started.md
