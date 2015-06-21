<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Translators */

$this->title = 'Update Translators: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="translators-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'languages' => $languages,
    ]) ?>

</div>
