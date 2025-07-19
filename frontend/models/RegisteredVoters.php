<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class RegisteredVoters extends ActiveRecord
{
    public static function tableName()
    {
        return 'registered_voters';
    }

    public function rules()
    {
        return [
            [['full_name', 'voter_id_number'], 'required'],
            [['full_name'], 'string', 'max' => 100],
            [['voter_id_number'], 'string', 'max' => 20],
            [['voter_id_number'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Majina Kamili',
            'voter_id_number' => 'Namba ya Kitambulisho',
            'has_voted' => 'Ameshapiga Kura',
        ];
    }
}
