<?php

namespace app\models;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name Имя
 * @property string $last_name Фамилия
 * @property string $email Email
 * @property string $avatar
 * @property string $password Пароль
 * @property string $date_entered Дата создания
 * @property string $date_modified Дата редактирования
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const SCENARIO_CREATE = 1;

    public $authKey;
    public $accessToken;
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'avatar'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 32],
            [['file'], 'safe'],
            [['password'], 'string', 'min' => 4, 'max' => 64],
            [['password', 'first_name', 'last_name', 'email'], 'required'],
            [['password', 'first_name', 'last_name', 'email'], 'trim'],
            [['password'], 'hashPassword', 'on' => self::SCENARIO_CREATE],
        ];
    }

    public function hashPassword()
    {
        $this->password = md5($this->password);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Email',
            'password' => 'Пароль',
            'date_entered' => 'Дата создания',
            'date_modified' => 'Дата редактирования',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::find()->andWhere([
            'id' => $id,
        ])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()->andWhere([
            'accessToken' => $token,
        ])->cache(60*60)->one();
    }

    /**
     * @param $email
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function findByEmail($email)
    {
        return static::find()->andWhere([
            'email' => $email,
        ])->cache(60)->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * create full user name
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
