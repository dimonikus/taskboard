<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_position".
 *
 * @property int $id
 * @property string $position Должность
 */
class UserPosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Должность',
        ];
    }
}
