<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Translators */

$this->title = 'Create Translators';
$this->params['breadcrumbs'][] = ['label' => 'Translators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translators-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'languages' => $languages,
    ]) ?>

</div>
