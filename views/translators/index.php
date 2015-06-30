<?php

use dektrium\user;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translators';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/default/_menu'); ?>
<div class="translators-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Translators', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [ 'id', 'src', 'dst',

            ['class' => 'yii\grid\ActionColumn' ]]
    ]); ?>

</div>
