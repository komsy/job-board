<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $mediaId
 * @property string $source
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source'], 'required'],
            [['source'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mediaId' => 'Media ID',
            'source' => 'Source',
        ];
    }
}
