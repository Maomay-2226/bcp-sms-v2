<?php

namespace app\controllers;

use Yii;
use app\models\ModuleGrant;
use app\models\ModuleGrantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModuleGrantController implements the CRUD actions for ModuleGrant model.
 */
class ModuleGrantController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'request' => ['POST'],
                        'approve' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ModuleGrant models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ModuleGrantSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ModuleGrant model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ModuleGrant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ModuleGrant();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionRequest($module_id)
    {
        $model = new ModuleGrant();
        $student_id = substr(Yii::$app->user->identity->username, 1);

        $model->module_list_id = $module_id;
        $model->is_requested = 'Yes';
        $model->is_approved = 'No';
        $model->student_id = $student_id;
        $model->save(false);

        Yii::$app->session->setFlash('success', 'Grant of access successfully requested');
        return $this->redirect(['/module-list/student']);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->is_approved = 'Yes';
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Grant of access successfully approved');
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing ModuleGrant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    

    /**
     * Deletes an existing ModuleGrant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ModuleGrant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ModuleGrant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ModuleGrant::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
