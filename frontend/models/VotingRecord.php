<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class VotingRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'voting_record';
    }

    public function rules()
    {
        return [
            [['full_name', 'voter_id_number', 'voted_at'], 'required'],
            [['full_name'], 'string', 'max' => 100],
            [['voter_id_number'], 'string', 'max' => 20],
            [['voted_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Jina la Mpiga Kura',
            'voter_id_number' => 'Namba ya Kitambulisho',
            'voted_at' => 'Muda wa Kupiga Kura',
        ];
    }
}
