<?php

namespace app\modules\translator\controllers;

use app\modules\translator\models\Translate;
use app\modules\translator\models\TranslateSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Translate models.
     * @return mixed
     */

    public function actionIndex()
    {
        $qry = Translate::setTableName('de');
        $searchModel = new TranslateSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        //$dataProvider = new ActiveDataProvider(['query' => $qry::find(),]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Translate model.
     * @param integer $id
     * @return mixed
     */


    public function actionTest()
    {
        //source and destination languages
        $src='de';
        $dst='en';
         $model=[
         'src' => $this->findTranslation($src, '1'),
         'model' => $this->findTranslation($dst, '1'),
        ];
/*        $model=[
            'src' => $this->findTranslation($src, '1')->str,
            'model' => $this->findTranslation($dst, '1'),
        ];*/
        return $this->render('transcard', $model);
    }

    public function actionMain($id)
    {
        $sourceLang=Yii::$app->params['src'];
        $destinationLang=Yii::$app->params['dst'];
        $model = $this->findTranslation($destinationLang, $id);
        $model['source'] = $this->findTranslation($sourceLang, $id)->str;
        if(strlen($model->str)<=1){$model['yandex'] =Yii::$app->translate->translate($sourceLang, $destinationLang, $model['source'])['text'][0];}

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['main', 'id' => $model->id+1]);
        } else {
            return $this->render('transcard', [
                'model' => $model,
            ]);
        }
    }
    protected function findTranslation($lng, $id)
    {
         $model = Translate::setTableName($lng);
        if (($model = Translate::findOne($id)) !== null) {
            return $model;
        } else {
            return $this->redirect(['main']);
//            throw new NotFoundHttpException('DND.');
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
