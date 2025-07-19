<?php

use yii\helpers\Html;

$this->title = 'Welcome Admin';
?>

<div class="site-index" style="background: linear-gradient(to right, #ffe6cc, #ff9966); color: #333; height: 100vh; padding-top: 100px; text-align: center;">

    <div class="container">
        <h1 style="font-size: 48px; font-weight: bold;">Welcome Back, Admin!</h1>
        <p style="font-size: 20px; margin-top: 20px;">
            You're now inside the Admin Panel of the Online Voting System.<br>
            Manage candidates, monitor votes, and view live results transparently.
        </p>
        
        <p style="margin-top: 40px;">
                    <?= Html::a('Go to Dashboard', ['site/admin'], [
    'class' => 'btn btn-lg btn-dark',
    'style' => 'padding: 10px 30px; border-radius: 30px; font-weight: bold;'
]) ?>

        </p>
    </div>
</div>
