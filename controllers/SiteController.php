<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use yii\captcha\CaptchaAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\Security;
use yii\mail\MailerInterface;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

class SiteController extends Controller
{
    public $layout = '@vendor/carono/yii2-metronic/src/views/layouts/demo3';

    public function __construct(
        $id,
        $module,
        private readonly MailerInterface $mailer,
        private readonly Security $security,
        $config = [],
    ) {
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'transparent' => true,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm($this->security);

        if ($model->load($this->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', ['model' => $model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact(): Response|string
    {
        $model = new ContactForm();

        $contact = $model->load($this->request->post()) && $model->contact(
            $this->mailer,
            Yii::$app->params['adminEmail'],
            Yii::$app->params['senderEmail'],
            Yii::$app->params['senderName'],
        );

        if ($contact) {
            Yii::$app->session->setFlash(
                'success',
                'Thank you for contacting us. We will respond to you as soon as possible.',
            );

            return $this->refresh();
        }

        return $this->render('contact', ['model' => $model]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout(): string
    {
        return $this->render('about');
    }

    /**
     * Showcase виджетов Metronic — Card, Badge, Avatar, Alert, Tabs, Modal, Drawer.
     */
    public function actionComponents(): string
    {
        return $this->render('components');
    }

    /**
     * Smoke-страница для проверки layout-а demo9 (sticky topnav без sidebar).
     */
    public function actionTopnav(): string
    {
        $this->layout = '@vendor/carono/yii2-metronic/src/views/layouts/demo9';
        return $this->render('topnav');
    }

    /**
     * Smoke-страница: GridView + DetailView на ArrayDataProvider.
     */
    public function actionGrid(): string
    {
        $rows = [
            ['id' => 1, 'name' => 'Alice Cooper',  'email' => 'alice@example.com', 'role' => 'Admin',  'status' => 'active',  'created_at' => 1717180000],
            ['id' => 2, 'name' => 'Bob Marley',    'email' => 'bob@example.com',   'role' => 'Editor', 'status' => 'active',  'created_at' => 1716580000],
            ['id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com','role' => 'Viewer', 'status' => 'invited', 'created_at' => 1715980000],
            ['id' => 4, 'name' => 'Daisy Duke',    'email' => 'daisy@example.com', 'role' => 'Editor', 'status' => 'banned',  'created_at' => 1715380000],
            ['id' => 5, 'name' => 'Eve Polastri',  'email' => 'eve@example.com',   'role' => 'Admin',  'status' => 'active',  'created_at' => 1714780000],
        ];
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rows,
            'pagination' => ['pageSize' => 3],
            'sort' => ['attributes' => ['id', 'name', 'email', 'role', 'status', 'created_at']],
        ]);

        return $this->render('grid', [
            'dataProvider' => $dataProvider,
            'detail' => $rows[0],
        ]);
    }
}
