<?php

use yii\bootstrap\Nav;

?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [

        [
            'label'   => 'Translation',
            'url'     => ['/translator/default/index'],
            'visible' => isset(Yii::$app->user->identity->isAdmin),
        ],
        [
            'label'   => 'Translators',
            'url'   => ['/translator/translators/index'],
            'visible' => Yii::$app->user->identity->isAdmin,
        ],
        [
            'label'   => 'Languages',
            'url'   => ['/translator/languages/index'],
            'visible' => Yii::$app->user->identity->isAdmin,
        ],

    ],
]) ?>