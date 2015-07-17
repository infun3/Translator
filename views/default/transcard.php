<?php

use yii\bootstrap\Collapse;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Inflector;


/* @var $this yii\web\View */
/* @var $model app\modules\Translator\models\Translate */

$this->title = "id: ".substr($model->id,0,10);
$this->params['breadcrumbs'][] = ['label' => 'Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $items = [];
foreach($sources['src'] as  $key => $value){
    $items[]=[
        'label' => $sources['dst'][$key]['str'],
        'content' => '['. Html::a($value['id'],['view', 'id' => $value['id']]) .'] '.
            Html::encode($value['str']),
            Html::encode($sources['dst'][$key]['str']),
    ];

}
?>




<div class="panel panel-group">

    <div class="panel panel-default">
    <div class="panel panel-default">

		<div class="panel-body">
			<?= $model->source ?>
		</div>


		<div class="panel-body">
            <?= $source['src_file'] ?>
		</div>
    </div>
                <?php !isset($model->yandex)?: print(Html::beginTag('div',['class' => 'panel panel-warning']).
                Html::tag('div', Html::tag('h3', "Yandex", ['class' => 'panel-title']), ['class' => 'panel-heading']). Html::tag('div', Html::encode($model->yandex), ['class' => 'panel-body']).Html::endTag('div')
                ) ?>
    <div class="panel panel-default">

            <div class="panel-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>

        </div>
    <div class="panel-body">
        <?= Collapse::widget([
            'items' => $items
        ]);?>
    </div>
    <div class="panel-group ">
        <div class="panel panel-default">
            <div class="panel panel-body">
                <?= Collapse::widget([
                    'items' =>[['label'=> 'Comments', 'content'=> Yii::$app->runAction('/translator/comments/index') ]]
                ]);?>
                <?= Yii::$app->runAction('/translator/comments/create')?>
            </div>
        </div>
