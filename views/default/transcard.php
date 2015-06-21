<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Block;

/* @var $this yii\web\View */
/* @var $model app\models\Translate */

$this->title = "id: ".substr($model->id,0,10);
$this->params['breadcrumbs'][] = ['label' => 'Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translate-view">

    <h1><?= Html::encode($this->title) ?></h1>



	<div class="panel panel-default">
		 <div class="panel-heading">
			<h3 class="panel-title">$src</h3>
		</div>
		<div class="panel-body">
			<?= $model->source ?>
		</div>
	</div>

    <div class="panel panel-warning">
		 <div class="panel-heading">
			<h3 class="panel-title">Yandex</h3>
		</div>
		<div class="panel-body">
			<?=$model->yandex?>
		</div>
	</div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">$dst</h3>
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>

    </div>
</div>
