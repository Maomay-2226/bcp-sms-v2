<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Students;
use app\models\Enrollments;
use app\models\Announcement;
use app\models\Event;
use app\models\Concern;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $students = Students::find()->count();
        $active_students = Students::find()->where(['status' => 'Active'])->count();
        $active_enrollment = Enrollments::find()->where(['status' => 'Active'])->count();
        $page = !Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin' ? 'index' : 'index-student';

        $activeAnnouncements = Announcement::find()
                            ->where(['<=', 'date_to_post', date('Y-m-d H:i:s')])
                            ->andWhere(['>=', 'date_to_expire', date('Y-m-d H:i:s')])
                            ->all();

        $activeEvents = Event::find()->orderBy(['date' => SORT_DESC])->all();
        $student_id = substr(Yii::$app->user->identity->username, 1);
        $activeConcerns = Concern::find()->where(['student_id' => $student_id])->orderBy(['date' => SORT_DESC])->all();

        return $this->render($page, [
            'students' => $students,
            'active_students' => $active_students,
            'active_enrollment' => $active_enrollment,
            'activeAnnouncements' => $activeAnnouncements,
            'activeEvents' => $activeEvents,
            'activeConcerns' => $activeConcerns,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
