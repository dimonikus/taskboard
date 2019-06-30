<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_position".
 *
 * @property int $id
 * @property int $department_id
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
            [['department_id'], 'safe'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(UserDepartment::class, ['id' => 'department_id']);
    }
}
