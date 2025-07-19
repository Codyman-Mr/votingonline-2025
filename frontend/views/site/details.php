<?php
use yii\helpers\Html;
use yii\helpers\Url;

// Check if there is any message from the controller (success or failure)
?>

<div class="site-details">
    <h2>Verify Your Details</h2>

    <?= Html::beginForm(['site/details'], 'post') ?>

    <label>Full Name:</label>
    <?= Html::textInput('full_name', $fullname, ['class' => 'form-control', 'required' => true]) ?>

    <label>Voter ID:</label>
    <?= Html::textInput('voter_id', $voter_id, ['class' => 'form-control', 'required' => true]) ?>

    <br>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

    <br><br>
    <?php if ($message): ?>
        <div style="font-weight: bold; color: <?= strpos($message, 'Congratulations') !== false ? 'green' : 'red' ?>;">
            <?= Html::encode($message) ?>
        </div>
    <?php endif; ?>

    <?= Html::endForm() ?>
</div>
