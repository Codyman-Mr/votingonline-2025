<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Candidate extends ActiveRecord
{
    // Table name
    public static function tableName()
    {
        return 'candidates'; // tumia jina sahihi lililo kwenye database yako
    }

    // Validation rules
    public function rules()
    {
        return [
            [['name'], 'required'], // Name is required
            [['name'], 'string', 'max' => 100], // Max length of name is 100 characters
            [['photo'], 'string', 'max' => 255], // Max length for photo URL or path
            [['photo'], 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png', 'skipOnEmpty' => true], // File validation for photo
        ];
    }

    // Attribute labels for form and display
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Candidate Name',
            'photo' => 'Candidate Photo',
        ];
    }

    // Function to handle photo upload
    public function uploadPhoto()
    {
        // Check if file was uploaded and validated
        if ($this->validate()) {
            // Get the uploaded photo file
            $file = UploadedFile::getInstance($this, 'photo');
            if ($file) {
                // Create the file path with a timestamp to avoid name conflicts
                $filePath = 'uploads/' . time() . '.' . $file->extension;

                // Save the file in the specified path
                if ($file->saveAs($filePath)) {
                    $this->photo = $filePath; // Update the 'photo' attribute with the file path
                    return true; // Indicate that the upload was successful
                }
            }
        }
        return false; // Return false if the upload was not successful
    }
}
