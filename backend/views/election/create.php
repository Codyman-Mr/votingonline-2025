<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create New Election';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'start_date')->input('datetime-local') ?>
<?= $form->field($model, 'end_date')->input('datetime-local') ?>
<?= $form->field($model, 'status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive']) ?>

<div class="form-group">
    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
