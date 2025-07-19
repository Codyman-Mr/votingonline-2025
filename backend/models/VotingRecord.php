<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "voting_records".
 *
 * @property int $id
 * @property string $voter_id_number
 * @property string $full_name
 * @property string|null $candidate_name
 * @property string $voted_at
 */
class VotingRecord extends ActiveRecord
{
public static function tableName()
{
    return 'voting_records';
}


    public function rules()
    {
        return [
            [['voter_id_number', 'full_name', 'voted_at'], 'required'],
            [['voted_at'], 'safe'],
            [['voter_id_number', 'full_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'voter_id_number' => 'Voter ID Number',
            'full_name' => 'Full Name',
            
            'voted_at' => 'Voted At',
        ];
    }
}
