<?php

namespace app\models;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name Имя
 * @property string $last_name Фамилия
 * @property string $email Email
 * @property string $password Пароль
 * @property string $date_entered Дата создания
 * @property string $date_modified Дата редактирования
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

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
            [['date_entered', 'date_modified'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 64],
        ];
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
     * @return null|static
     */
    public static function findByEmail($email)
    {
        return static::find()->andWhere([
            'email' => $email,
        ])->cache(60)->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
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
        return $this->password === $password;
    }
}
