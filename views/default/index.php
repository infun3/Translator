<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'alert',
            'format' => 'boolean'],
            'id',
            'str',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',

        ],
    ]]); ?>

</div>
