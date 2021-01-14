<?php

namespace frontend\models;

use common\models\User; 
use Yii;

/**
 * This is the model class for table "jobseeker".
 *
 * @property int $seekId
 * @property int $userId
 * @property string $fullName
 * @property int $age
 * @property string $educationLevel
 * @property string $fieldOfStudy
 * @property string $careerObjective
 * @property int $newsSource
 * @property string $userImage
 * @property string $UploadCv
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Apply[] $applies
 * @property User $user
 * @property Media $newsSource0
 */
class Jobseeker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobseeker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'fullName', 'age', 'educationLevel', 'fieldOfStudy', 'careerObjective', 'newsSource', 'userImage', 'UploadCv'], 'required'],
            [['userId', 'age', 'newsSource'], 'integer'],
            [['careerObjective'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['fullName', 'educationLevel', 'fieldOfStudy', 'userImage', 'UploadCv'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['newsSource'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['newsSource' => 'mediaId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seekId' => 'Seek ID',
            'userId' => 'User ID',
            'fullName' => 'Full Name',
            'age' => 'Age',
            'educationLevel' => 'Education Level',
            'fieldOfStudy' => 'Field Of Study',
            'careerObjective' => 'Career Objective',
            'newsSource' => 'News Source',
            'userImage' => 'User Image',
            'UploadCv' => 'Upload Cv',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Applies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplies()
    {
        return $this->hasMany(Apply::className(), ['seekId' => 'seekId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * Gets query for [[NewsSource0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsSource0()
    {
        return $this->hasOne(Media::className(), ['mediaId' => 'newsSource']);
    }
}
