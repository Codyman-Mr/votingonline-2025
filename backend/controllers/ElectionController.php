<?php
namespace backend\controllers;

use Yii;
use common\models\Election;
use yii\web\Controller;

class ElectionController extends Controller
{
public function actionCreate()
{
    $model = new Election(); // au common\models\Election kama model iko common

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Election created successfully!');
        return $this->redirect(['/site/admin']); // ama admin/dashboard
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}
}