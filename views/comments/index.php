<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\translator\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="comments-index">
    <h1>Comments</h1>




<?= ListView::widget([
        'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'options' => ['class' => 'panel panel-default'],
    'itemView' => '_comment',
]) ?>
</div>
