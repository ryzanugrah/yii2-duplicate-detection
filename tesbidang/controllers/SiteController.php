<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\JawabanForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
        return $this->render('index');
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays jawaban page.
     *
     * @return string
     */
    public function actionJawaban()
    {
        // create a new instance of JawabanForm model
        $model = new JawabanForm();

        // check if form data was submitted and valid
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // split the comma-separated KTP numbers into an array
            $ktpArray = explode(",", $model->ktp);

            // store any duplicates array in $pelanggar
            $pelanggar = $this->temukanPelanggar($ktpArray);

            return $this->render('jawaban', ['model' => $model, 'pelanggar' => $pelanggar]);
        }

        // if form data was not submitted or model data is invalid, render the 'jawaban' view with the model data only
        return $this->render('jawaban', ['model' => $model]);
    }

    public function temukanPelanggar($ktpArray)
    {
        // create an empty array to store any duplicate KTP numbers
        $pelanggar = [];

        // count the occurrences of each KTP number in the array
        $ktpCount = array_count_values($ktpArray);

        foreach ($ktpCount as $ktp => $count) {
            // add any KTP numbers with a count greater than 1
            if ($count > 1) {
                $pelanggar[] = $ktp;
            }
        }

        if (empty($pelanggar)) {
            $pelanggar[] = "Tidak ditemukkan adanya KTP pelanggar";
        }

        return $pelanggar;
    }
}
