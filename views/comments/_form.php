<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\translator\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(['action' => ['/translator/comments/create']]); ?>
    <?php if ($model->isNewRecord) {
        $model->isNewRecord;
        echo $form->field($model, 'str_id')->hiddenInput(['value' => Yii::$app->request->get('id')])->label(false);
    } else {
        echo $form->field($model, 'str_id')->textInput();
        echo $form->field($model, 'uid')->textInput();
        echo $form->field($model, 'timestamp')->textInput();

    };
    ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Send' :
                'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
