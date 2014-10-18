<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegisterForm extends Model
{
    public $email;
    public $name;
    
    public $captcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'name','captcha'], 'required'],
            ['captcha', 'captcha'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'ФИО:',
            'captcha' => '',
        ];
    }    

    public function register()
    {
        if(User::findOne(['email' => $this->email]) !== null) return false;
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->password = "";
        $user->activated = 0;
        if ($user->save() !== false) {
            return true;
        } else {
            return false;
        }
    }
}
