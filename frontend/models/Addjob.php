<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "addjob".
 *
 * @property int $jobId
 * @property int $company
 * @property int $companySize
 * @property string $positionName
 * @property string $salaryRange
 * @property string $requirements
 * @property string $responsibilities
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Kampuni $company0
 * @property Apply[] $applies
 */
class Addjob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addjob';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company', 'companySize', 'positionName', 'salaryRange', 'requirements', 'responsibilities'], 'required'],
            [['company', 'companySize'], 'integer'],
            [['requirements', 'responsibilities'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['positionName', 'salaryRange'], 'string', 'max' => 255],
            [['company'], 'exist', 'skipOnError' => true, 'targetClass' => Kampuni::className(), 'targetAttribute' => ['company' => 'companyId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jobId' => 'Job ID',
            'company' => 'Company',
            'companySize' => 'Company Size',
            'positionName' => 'Position Name',
            'salaryRange' => 'Salary Range',
            'requirements' => 'Requirements',
            'responsibilities' => 'Responsibilities',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Company0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany0()
    {
        return $this->hasOne(Kampuni::className(), ['companyId' => 'company']);
    }

    /**
     * Gets query for [[Applies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplies()
    {
        return $this->hasMany(Apply::className(), ['jobId' => 'jobId']);
    }
}
