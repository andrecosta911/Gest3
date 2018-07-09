<?php

namespace backend\controllers;

use Yii;
use backend\models\Uc_0;
use backend\models\Uc_0Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Uc_1;

/**
 * Uc_0Controller implements the CRUD actions for Uc_0 model.
 */
class Uc_0Controller extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uc_0 models.
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'home';
        $searchModel = new Uc_0Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Uc_0 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $this->layout = 'home';
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Uc_0 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = 'home';
        $model = new Uc_0();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUc0]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Uc_0 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = 'home';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUc0]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Uc_0 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Uc_0 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uc_0 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Uc_0::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionList($id) {
        $uc_n1 = Uc_1::findOne($id);
        $countUc = Uc_0::find()->where(['area_cientifica_idArea' => $uc_n1->area_cientifica_idArea])->count();
        $uc = Uc_0::find()->where(['area_cientifica_idArea' => $uc_n1->area_cientifica_idArea])->all();
        $countAll = Uc_0::find()->all();

        if ($uc_n1->area_cientifica_idArea == NULL) {
            echo "<option></option>";
            foreach ($countAll as $countAlls) {
                echo "<option value ='" . $countAlls->idUc0 . "'>" . $countAlls->designacao . "</option>";
            }
        } else {
            if ($countUc > 0) {
                echo "<option></option>";
                foreach ($uc as $ucs) {
                    echo "<option value ='" . $ucs->idUc0 . "'>" . $ucs->designacao . "</option>";
                }
            } else {
                echo "<option></option>";
            }
        }
    }

}
