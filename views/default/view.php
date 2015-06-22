<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Translator\models\Translate*/
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translate-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'str',
            'alert',
        ],
    ]) ?>
    <?=
    Html::a('Back', ['update', 'id' => $model->id-1], [
        'class' => 'btn btn-primary',
    ])?><?=
    Html::a('Next', ['update', 'id' => $model->id+1], [
        'class' => 'btn btn-default',
    ])?>

</div>
