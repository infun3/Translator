<?php

use yii\bootstrap\Progress;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translates';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/default/_menu'); ?>
<div class="translate-index">
    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'alert',
            'format' => 'boolean'],
            'id',
            ['attribute'=>'str',
                'label' => $directions['dst'],
                ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',

        ],
    ]]); ?>

</div>
