<?php

/* @var $this yii\web\View */
/* @var $model app\modules\translator\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="panel panel-default">
    <div class="panel panel-heading">
        <?= $model->uid ?> @ <?= $model->timestamp ?>
    </div>
    <div class="panel panel-body">
        <?= $model->comment ?>
    </div>
</div>