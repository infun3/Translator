<?php

namespace app\modules\translator\controllers;

use app\modules\translator\models\Translate;
use app\modules\translator\models\TranslateSearch;
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
        $src='en';
        $dst='de';
        $model = $this->findTranslation($dst, $id);
        $src = $this->findTranslation($src, $id)->str;
        $model['src']=$src;

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['main', 'id' => $model->id+1]);
        } else {
            return $this->render('transcard', [
                'model' => $model,
                'src' => $src,

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
