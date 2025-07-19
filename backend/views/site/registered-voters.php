<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $voters */

$this->title = 'Registered Voters';
?>
<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Voter ID Number</th>
            <th>Has Voted</th>
            <th>Registration Deadline</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voters as $voter): ?>
            <tr>
                <td><?= Html::encode($voter->id) ?></td>
                <td><?= Html::encode($voter->full_name) ?></td>
                <td><?= Html::encode($voter->voter_id_number) ?></td>
                <td><?= $voter->has_voted ? 'Yes' : 'No' ?></td>
                <td><?= Html::encode($voter->registration_deadline) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
