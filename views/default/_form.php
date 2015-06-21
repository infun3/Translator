<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Translate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeHiddenInput($model, 'id', ['value' => $model->id])?>

    <?= Html::activeHiddenInput($model, 'user_id', ['value' => Yii::$app->user->identity->getId()])?>

    <?= $form->field($model, 'str')->textarea() ?>

    <?= $form->field($model, 'alert')->checkbox(array('label'=>''))->hint('If u want to mark this one')->label('Mark'); ?>

    <div class="form-group">
     
        <?= Html::submitButton($model->isNewRecord ? : 'Save & next', ['class' =>'btn btn-success pull-right',
            'data' => [
                'confirm' => 'everything nice and tidy?',
            ],]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=
Html::a('Back', ['main', 'id' => $model->id-1], [
'class' => 'btn btn-primary',
])?><?=
Html::a('Next', ['main', 'id' => $model->id+1], [
'class' => 'btn btn-default',
])?>