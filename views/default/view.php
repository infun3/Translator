<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Translator\models\Translate*/
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">


    <div class="panel panel-default">
        <div class="panel-heading">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel panel-body">
            <p>
            </p>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'str',
                    'alert',
                ],
            ]) ?>
            <?=Html::a('Back', ['view', 'id' => $model->id-1], ['class' => 'btn btn-primary',])?>
            <?=Html::a('Next', ['view', 'id' => $model->id+1], ['class' => 'btn btn-default',])?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

        </div>
    </div>

    <div class="panel-group ">
        <div class="panel panel-default">
                <div class="panel panel-body">
                <?= Yii::$app->runAction('//translator/comments/index')?>
                <?= Yii::$app->runAction('//translator/comments/create')?>
                </div>
            </div>
        </div>
    </div>
