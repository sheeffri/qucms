<?php
namespace common\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeatPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с таким именем уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_]*$/', 'message' => 'Имя пользователя может содержать только латинские символы, цифры и знак подчеркивания.'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с таким E-mail уже существует.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['repeatPassword', 'required'],
            ['repeatPassword', 'string', 'min' => 6],
            ['repeatPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'repeatPassword' => 'Повтор пароля',
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            return User::create($this->attributes);
        }

        return null;
    }
}
