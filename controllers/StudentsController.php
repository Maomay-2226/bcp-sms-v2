<?php

namespace app\controllers;

use Yii;
use app\models\Students;
use app\models\SubjectEnrollment;
use app\models\Enrollments;
use app\models\Schedule;
use app\models\search\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['create', 'index', 'update', 'view', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['create', 'index', 'update', 'view', 'delete'],
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
            ]
        );
    }

    /**
     * Lists all Students models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel(($id));
        $modelSchedules = [];
        $modelEnrollment = Enrollments::find()->where(['student_id' => $id, 'status' => 'Active'])->one();
        $enrolled_flag = false;
        if(!$modelEnrollment){
            $modelEnrollment = new Enrollments;
        }
        else{
            $enrolled_flag = true;
            $modelSchedules = Schedule::find()->joinWith('subject')->where(['course_id' => $modelEnrollment->course_id])->all();
        }
        $modelEnrollment->student_id = $id;

        if ($model->load($this->request->post())) {
            $model->fileUploads = UploadedFile::getInstances($model, 'fileUploads');
            if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else{
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
        }

        return $this->render('view', [
            'model' => $model,
            'modelEnrollment' => $modelEnrollment,
            'modelSchedules' => $modelSchedules,
            'enrolled_flag' => $enrolled_flag,
        ]);
    }

    public function actionPrintSchedule($id){
        $model = $this->findModel(($id));
        $modelSchedules = [];
        $modelEnrollment = Enrollments::find()->where(['student_id' => $id, 'status' => 'Active'])->one();
        if(!$modelEnrollment){
            $modelEnrollment = new Enrollments;
        }
        else{
            $modelSchedules = Schedule::find()->joinWith('subject')->where(['course_id' => $modelEnrollment->course_id])->all();
        }
        $modelEnrollment->student_id = $id;

        return $this->renderPartial('print_sched', [
            'model' => $model,
            'modelEnrollment' => $modelEnrollment,
            'modelSchedules' => $modelSchedules,
        ]);
    }

    public function actionAddSchedule($student_id, $subject_id, $academic_year, $semester, $schedule_id){
        $check_enrollment = SubjectEnrollment::find()->where([
            'student_id'=>$student_id,
            'subject_id'=>$subject_id,
            'academic_year'=>$academic_year,
            'semester'=>$semester,
            'schedule_id'=>$schedule_id,
        ])->exists();
        if($check_enrollment){
            Yii::$app->session->setFlash('warning', 'Schedule already exists.');
        }
        else{
            $model = new SubjectEnrollment;
            $model->student_id = $student_id;
            $model->subject_id = $subject_id;
            $model->academic_year = $academic_year;
            $model->semester = $semester;
            $model->schedule_id = $schedule_id;
            $model->save();
            Yii::$app->session->setFlash('success', 'Schedule has been added.');
        }
        
        return $this->redirect(['view', 'id' => $student_id]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Students();

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

    public function actionCreateEnrollment($student_id)
    {
        $check_active = Enrollments::find()->where(['status' => 'Active', 'student_id' => $student_id])->one();
        if($check_active){
            $model = $check_active;
            $msg = 'updated';
        }
        else{
            $msg = 'added';
            $model = new Enrollments();
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Enrollment has been '.$msg.'.');
                return $this->redirect(['view', 'id' => $model->student_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Students model.
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
     * Deletes an existing Students model.
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
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
