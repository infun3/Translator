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
        <?= Html::a('Create Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'str',
            'alert',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
