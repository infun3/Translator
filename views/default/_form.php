<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model infun3\translator\models\Translate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeHiddenInput($model, 'id', ['value' => $model->id])?>

    <?= Html::activeHiddenInput($model, 'user_id', ['value' => Yii::$app->user->identity->getId()])?>
    <?= $form->field($model, 'str')->textarea()->label(false) ?>
    <?= $form->field($model, 'alert',  [
        'template' => "<div class=\" pull-right\">{input}</div>\n",
    ])->checkbox(array('label'=>'Mark')); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? : 'Save & next', ['class' =>'btn btn-success pull-right',]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=
Html::a('Back', ['update', 'id' => $model->id-1], [
'class' => 'btn btn-primary',
])?><?=
Html::a('Next', ['update', 'id' => $model->id+1], [
'class' => 'btn btn-warning',
])?>