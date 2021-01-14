<?php

namespace frontend\models;

use common\models\User; 
use Yii;

/**
 * This is the model class for table "apply".
 *
 * @property int $applyId
 * @property int $companyId
 * @property int $userId
 * @property int $seekId
 * @property int $jobId
 *
 * @property User $user
 * @property Kampuni $company
 * @property Jobseeker $seek
 * @property Addjob $job
 */
class Apply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'userId', 'seekId', 'jobId'], 'required'],
            [['companyId', 'userId', 'seekId', 'jobId'], 'integer'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['companyId'], 'exist', 'skipOnError' => true, 'targetClass' => Kampuni::className(), 'targetAttribute' => ['companyId' => 'companyId']],
            [['seekId'], 'exist', 'skipOnError' => true, 'targetClass' => Jobseeker::className(), 'targetAttribute' => ['seekId' => 'seekId']],
            [['jobId'], 'exist', 'skipOnError' => true, 'targetClass' => Addjob::className(), 'targetAttribute' => ['jobId' => 'jobId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'applyId' => 'Apply ID',
            'companyId' => 'Company ID',
            'userId' => 'User ID',
            'seekId' => 'Seek ID',
            'jobId' => 'Job ID',
        ];
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
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Kampuni::className(), ['companyId' => 'companyId']);
    }

    /**
     * Gets query for [[Seek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeek()
    {
        return $this->hasOne(Jobseeker::className(), ['seekId' => 'seekId']);
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Addjob::className(), ['jobId' => 'jobId']);
    }
}
