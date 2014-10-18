<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $lvl
 * @property string $hierarchy
 *
 * @property Files[] $files
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'lvl', 'hierarchy'], 'required'],
            [['parent_id', 'lvl'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['hierarchy'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'parent_id' => 'ID родителя',
            'lvl' => 'Уровень',
            'hierarchy' => 'Иерархия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['sections_id' => 'id']);
    }
}
