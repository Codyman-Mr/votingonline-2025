<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "registered_voters".
 *
 * @property int $id
 * @property string $full_name
 * @property string $voter_id_number
 * @property int $has_voted
 * @property string|null $registration_deadline
 */
class RegisteredVoter extends ActiveRecord
{
    public static function tableName()
    {
        return 'registered_voters';
    }

    public function rules()
    {
        return [
            [['full_name', 'voter_id_number'], 'required'],
            [['has_voted'], 'integer'],
            [['registration_deadline'], 'safe'],
            [['full_name', 'voter_id_number'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'voter_id_number' => 'Voter ID Number',
            'has_voted' => 'Has Voted',
            'registration_deadline' => 'Registration Deadline',
        ];
    }
}
