<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use frontend\models\RegisteredVoters;
use backend\models\VotingRecord;
use backend\models\Candidates;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'actions' => ['login', 'error'],
                    'allow' => true,
                ],
                [
                    'actions' => ['logout', 'index', 'admin','results','voting-records', 'registered-voters'], 
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
                'class' => \yii\web\ErrorAction::class,
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
public function actionVotingRecords()
{
    $records = VotingRecord::find()->orderBy(['voted_at' => SORT_DESC])->all();

    return $this->render('voting-records', [
        'records' => $records,
    ]);
}
   public function actionAdmin()
{

    return $this->render('admin');
}

  public function actionRegisteredVoters()
{
    $voters = RegisteredVoters::find()->orderBy(['id' => SORT_DESC])->all();

    return $this->render('registered-voters', [
        'voters' => $voters,
    ]);
}

public function actionResults()
{
    $candidates = Candidates::find()->all(); // au jina la model lako sahihi
    return $this->render('results', [
        'candidates' => $candidates,
    ]);
}



    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

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
}
