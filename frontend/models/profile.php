<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \common\models\User $model */

$this->title = 'User Profile';
$this->params['breadcrumbs'][] = $this->title;

$profileImage = $model->profile_picture
    ? Yii::getAlias('@web/uploads/profile/' . $model->profile_picture)
    : Yii::getAlias('@web/images/default-avatar.png');
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <img src="<?= $profileImage ?>" alt="Profile Picture" class="img-thumbnail" width="200" height="200">
            </div>
        </div>
        <div class="col-md-8">
            <p><strong>Username:</strong> <?= Html::encode($model->username) ?></p>
            <p><strong>Email:</strong> <?= Html::encode($model->email) ?></p>

            <hr>

            <h4>Upload New Profile Picture</h4>

            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'profile_picture_file')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Upload Picture', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
