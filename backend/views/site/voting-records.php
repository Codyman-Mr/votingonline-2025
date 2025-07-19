<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\VotingRecord[] $records */

$this->title = 'Voting Records';
?>
<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Voter ID</th>
            <th>Full Name</th>
          
            <th>Voted At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= Html::encode($record->id) ?></td>
                <td><?= Html::encode($record->voter_id_number) ?></td>
                <td><?= Html::encode($record->full_name) ?></td>
              
                <td><?= Html::encode($record->voted_at) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
