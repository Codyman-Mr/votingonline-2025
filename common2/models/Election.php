<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "elections".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $type
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property string $created_at
 */
class Election extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'elections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date', 'status'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'in', 'range' => ['active', 'inactive']],
            [['title', 'type'], 'string', 'max' => 255],
            [['end_date'], 'compare', 'compareAttribute' => 'start_date', 'operator' => '>', 'type' => 'datetime', 'message' => 'End date must be after start date.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Election Title',
            'description' => 'Description',
            'type' => 'Type',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
