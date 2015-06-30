<?php

namespace infun3\translator\controllers;

use infun3\translator\models\Comments;
use infun3\translator\models\TransData;
use infun3\translator\models\Translate;
use infun3\translator\models\TranslateSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [

            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['view', 'index', 'update'],
                        'roles' => ['?'],
                    ],  [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    // deny all POST requests
                    [
                        'allow' => true,
                    ],
                    // allow POST
                    [

                        'allow' => true,
                        'actions' => ['view', 'index', 'update'],
                        'roles' => ['@'],
                        'verbs' => ['POST']
                    ],
                    // everything else is denied
                ],
            ],
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

        $searchModel = new TranslateSearch();
        $searchModel->setTableName($this->getDirections()['dst']);
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'directions' => $this->getDirections(),
        ]);
    }
    /**
     * Displays a single Translate model.
     * @param integer $id
     * @return mixed
     */




    public function actionView($id)
    {
        $direction= $this->getDirections(Yii::$app->user->identity->getId());

        return $this->render('view', [
            'model' => $this->findTranslation($direction['dst'], $id),
        ]);
    }
    public function actionUpdate($id)
    {
        $uid =Yii::$app->user->identity->getId();
        $direction= $this->getDirections($uid);
        $model = $this->findTranslation($direction['dst'], $id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id+1]);
        } else {

            $model['src'] = $direction['src'];
            $model['dst'] = $direction['dst'];
            $model['source'] = $this->findTranslation($model['src'], $id)->str;
            if(strlen($model->str)<=1){$model['yandex'] =Yii::$app->translate->translate($model['src'], $model['dst'], $model['source'])['text'][0];}

            return $this->render('transcard', [
                'model' => $model,
                'source' => TransData::find()->where(['id' => $id])->one(),

            ]);
        }
    }
    protected function findTranslation($lng, $id)
    {
        $model = Translate::setTableName($lng);
        if (($model = Translate::findOne($id)) !== null) {
            return $model;
        } else {
            //            return $this->redirect(['main']);
            throw new NotFoundHttpException('need more vars'.PHP_EOL.$lng.PHP_EOL.$id);
        }
    }

    /**
     * @param $lng
     * @param $id
     * @return null|void|static
     * @throws NotFoundHttpException
     */
    public function actionTest($id)
    {
        $direction= $this->getDirections(Yii::$app->user->identity->getId());

        return $this->render('view', [
            'model' => $this->findTranslation($direction['dst'], $id),
            'comments' => Comments::find()->where(['str_id' => $id])->all(),
        ]);


    }

    protected function getTranslationModels($lng, $id)
    {

        Translate::setTableName($lng);
        if (($model = Translate::findOne($id)) !== null) {return $model;} else {throw new NotFoundHttpException("cant find $lng #$id");}
    }
    protected function getDirections()
    {
        $id= Yii::$app->user->getId();
        return  (new \yii\db\Query())->select(['src','dst'])->from('translators')->where(['id' => $id])->one();
    }

}
