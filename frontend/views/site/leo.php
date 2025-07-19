<?php
use yii\helpers\Html;

$this->title = 'Congratulations';
?>

<div class="site-congrats" style="text-align: center; padding: 50px;">
    <h1>🎉 Congratulations!</h1>
    <p style="font-size: 18px;">Thank you for voting. Your vote has been counted successfully.</p>
    <p><?= Html::a('Back to Home', ['site/index'], ['class' => 'btn btn-primary']) ?></p>
</div>
