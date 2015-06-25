<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Translators */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="translators-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map($users, 'id', 'username')); ?>

    <?= $form->field($model, 'src')->dropDownList(ArrayHelper::map($languages, 'short', 'full' ), [$model->src=>['selected'=>'selected']]) ?>
    <?=$model->src?>
    <?= $form->field($model, 'dst')->dropDownList(ArrayHelper::map($languages, 'short', 'full'),  [$model->src=>['selected'=>'selected']]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
