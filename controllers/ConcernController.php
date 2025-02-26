<?php

namespace app\controllers;

use Yii;
use app\models\Concern;
use app\models\ConcernSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConcernController implements the CRUD actions for Concern model.
 */
class ConcernController extends Controller
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
                        'delete-submitted' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Concern models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConcernSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Concern model.
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

    public function actionSubmitted()
    {
        $student_id = substr(Yii::$app->user->identity->username, 1);
        $model = Concern::find()->where(['student_id' => $student_id])->all();

        return $this->render('submitted', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Concern model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Concern();

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

    public function actionCreateNew()
    {
        $model = new Concern();
        $student_id = substr(Yii::$app->user->identity->username, 1);
        $model->student_id = $student_id;
        $model->date = date('Y-m-d');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Concern successfully submitted');
                return $this->redirect(['submitted']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-new', [
            'model' => $model,
        ]);
    }

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

    public function actionUpdateSubmitted($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['submitted']);
        }

        return $this->render('update-submitted', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('danger', 'Concern successfully deleted');
        return $this->redirect(['index']);
    }

    public function actionDeleteSubmitted($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('danger', 'Concern successfully deleted');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Concern::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
