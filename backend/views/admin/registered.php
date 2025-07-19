<?php
use yii\helpers\Html;

/** @var $voters \frontend\models\Voter[] */
$this->title = 'Registered Voters';
?>

<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Registered On</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voters as $index => $voter): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= Html::encode($voter->full_name) ?></td>
                <td><?= Html::encode($voter->email) ?></td>
                <td><?= date('Y-m-d H:i', strtotime($voter->created_at)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
