<?php

namespace backend\controllers;

use Yii;
use backend\models\user;
use backend\models\userSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'home';
        $searchModel = new userSearch();
        $searchModel->tipo = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        //if (Yii::$app->user->can('registar-administradores')) {
        $this->layout = 'home';
        $model = new user();
        $idLast = $this->getLast();
        $id = $idLast + 1;
        $model->idUser = $id;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
//                $password = $this->randomString();
            $password = 'admin';
            $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            $model->save();
            return $this->actionIndex();
        } 
    //        elseif (Yii::$app->request->isAjax) {
    //            return $this->renderAjax('create', [
    //                        'model' => $model,
    //            ]);
    //        } 
        else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
//        } else {
//            throw new ForbiddenHttpException;
//        }
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = 'home';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->estado = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getLast() {
        $query = new Query;
        $query->select('*')
                ->from('user')
                ->orderBy('idUser');
        return $query->max('idUser');
    }

    protected function randomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
