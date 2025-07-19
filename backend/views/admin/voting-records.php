<?php
use yii\helpers\Html;

/** @var $records \frontend\models\VotingRecord[] */
$this->title = 'Voting Records';
?>

<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Voter Name</th>
            <th>Candidate Voted</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $index => $record): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= Html::encode($record->voter_name) ?></td>
                <td><?= Html::encode($record->candidate_name) ?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($record->voted_at)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
