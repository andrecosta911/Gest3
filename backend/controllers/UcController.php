<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Uc;

class UcController extends Controller {

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

    public function actionIndex() {
        $this->layout = 'home';
        return $this->render('index');
    }

    public function actionCreate() {
        $this->layout = 'home';
        $model = new Uc();
        if ($model->load(Yii::$app->request->post())) {
            echo $model->uc_1;
            echo $model->uc_0;
            die();
            //$model->save()
            return $this->actionIndex();
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

}
