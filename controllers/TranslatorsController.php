<?php

namespace infun3\translator\controllers;

use infun3\translator\models\Translators;
use infun3\translator\models\TranslatorsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * TranslatorsController implements the CRUD actions for Translators model.
 */
class TranslatorsController extends Controller
{
    public function behaviors()
    {
        return [ 'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login', 'signup'],
                    'roles' => ['?'],
                ],
                // deny all POST requests
                [
                    'allow' => true,
                    'verbs' => ['POST']
                ],
                // allow POST
                [
                    'allow' => true,
                    'roles' => ['@'],
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
     * Lists all Translators models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TranslatorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $searchModel->getUsers();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' =>  $searchModel->getUsers(),
        ]);
    }

    /**
     * Displays a single Translators model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'users' => Translators::getUsers() ,
            'languages' => Translators::getLanguages(),
        ]);
    }

    /**
     * Creates a new Translators model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Translators();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'users' =>  Translators::getUsers() ,
                'languages' => Translators::getLanguages(),
            ]);
        }
    }

    /**
     * Updates an existing Translators model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'users' => Translators::getUsers() ,
                'languages' => Translators::getLanguages(),
            ]);
        }
    }

    /**
     * Deletes an existing Translators model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Translators model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Translators the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Translators::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
