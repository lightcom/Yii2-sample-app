<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $name
 * @property integer $shared
 * @property string $mimetype
 * @property string $size
 * @property string $systime
 * @property string $description
 * @property integer $users_id
 * @property integer $sections_id
 *
 * @property Users $users
 * @property Sections $sections
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'shared', 'mimetype', 'size', 'systime', 'users_id', 'sections_id'], 'required'],
            [['shared', 'users_id', 'sections_id'], 'integer'],
            [['systime'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['mimetype'], 'string', 'max' => 45],
            [['size'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя файла',
            'shared' => 'Доступ',
            'mimetype' => 'Тип',
            'size' => 'Размер',
            'systime' => 'Системное время',
            'description' => 'Описание',
            'users_id' => 'Пользователь',
            'sections_id' => 'Sections ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasOne(Sections::className(), ['id' => 'sections_id']);
    }
}
