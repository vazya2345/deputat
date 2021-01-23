<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string|null $create_date
 * @property string|null $mod_date
 *
 * @property Deputats[] $deputats
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'role_id'], 'required'],
            [['role_id'], 'integer'],
            [['create_date', 'mod_date'], 'safe'],
            [['login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'role_id' => 'Role ID',
            'create_date' => 'Create Date',
            'mod_date' => 'Mod Date',
        ];
    }

    /**
     * Gets query for [[Deputats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeputats()
    {
        return $this->hasMany(Deputats::className(), ['user_id' => 'id']);
    }
}
