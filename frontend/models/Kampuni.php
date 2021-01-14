<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kampuni".
 *
 * @property int $companyId
 * @property int $userId
 * @property string $companyName
 * @property string $country
 * @property string $location
 * @property string $industry
 * @property string $website
 * @property string $telephone
 * @property string $companyImage
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Addjob[] $addjobs
 * @property Apply[] $applies
 */
class Kampuni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kampuni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'companyName', 'country', 'location', 'industry', 'website', 'telephone', 'companyImage'], 'required'],
            [['userId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['companyName', 'country', 'location', 'industry', 'website', 'companyImage'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'companyId' => 'Company ID',
            'userId' => 'User ID',
            'companyName' => 'Company Name',
            'country' => 'Country',
            'location' => 'Location',
            'industry' => 'Industry',
            'website' => 'Website',
            'telephone' => 'Telephone',
            'companyImage' => 'Company Image',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Addjobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddjobs()
    {
        return $this->hasMany(Addjob::className(), ['company' => 'companyId']);
    }

    /**
     * Gets query for [[Applies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplies()
    {
        return $this->hasMany(Apply::className(), ['companyId' => 'companyId']);
    }
}
