<?php

namespace backend\modules\docente\controllers;

use Yii;
use backend\modules\docente\models\Docente;
use backend\modules\docente\models\DocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\filters\AccessControl;

/**
 * DocenteController implements the CRUD actions for Docente model.
 */
class DocenteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'delete', 'view',],
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
     * Lists all Docente models.
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = "@app/views/layouts/home";
        $searchModel = new DocenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $this->layout = "@app/views/layouts/home";
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Docente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = "@app/views/layouts/home";
        $model = new Docente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $idDocente = $model->idDocente;

            $model->username = 'd' . $idDocente;
            $password = $this->randomString();
            $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            $model->criado_em = date("d/m/Y");
            $model->atualizado_em = 'Sem atualizações';

            $model->save();

            Yii::$app->mailer->compose()
                    ->setFrom(['andremailspam@gmail.com' => 'Conselho Pedagógico EEUM'])
                    ->setTo($model->email)
                    ->setSubject('Registo na plataforma de gestão de alunos do 3º Ciclo da EEUM')
                    ->setHtmlBody('<p>Face ao seu registo na plataforma de gestão de alunos do 3º Ciclo da EEUM, vimos por este meio enviar as suas credenciais de acesso.</p>'
                            . '<br>'
                            . 'Username: ' . $model->username . '<br>'
                            . 'Password: ' . $password . '<br>'
                            . '<br>'
                            . '<p>A Direção do Conselho Pedagógico</p>')
                    ->send();
            $this->insertAdmin($model->idDocente, $model->nome, $model->username, $model->password_hash, $model->email);
            return $this->redirect(['view', 'id' => $model->idDocente]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Docente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = "@app/views/layouts/home";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->atualizado_em = date("d/m/Y");
            $model->save();
            return $this->redirect(['view', 'id' => $model->idDocente]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Docente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Docente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Docente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Docente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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

    protected function insertAdmin($id, $nome, $username, $password, $email) {
        (new Query)
                ->createCommand()
                ->insert('user', [
                    'idUser' => $id,
                    'nome' => $nome,
                    'username' => $username,
                    'password_hash' => $password,
                    'email' => $email,
                    'estado' => 10,
                    'tipo' => 2])
                ->execute();
    }

}
