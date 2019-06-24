<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_department".
 *
 * @property int $id
 * @property string $department Отдел
 */
class UserDepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'Отдел',
        ];
    }
}
