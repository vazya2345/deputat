<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "deputats".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $okrug_id
 * @property string|null $info1
 * @property string|null $desc
 * @property string|null $add_info
 *
 * @property Users $user
 * @property Murojats[] $murojats
 */
class Deputats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $username;
    public $password;
    public $password2;

    public static function tableName()
    {
        return 'deputats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'okrug_id'], 'required'],
            [['user_id', 'okrug_id'], 'integer'],
            [['user_id'], 'unique'],
            [['desc'], 'string'],
            [['name', 'info1', 'add_info', 'username', 'password', 'password2'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Фойдаланувчи',
            'name' => 'Исм-шарифи',
            'okrug_id' => 'Округ',
            'info1' => 'Маълумот',
            'desc' => 'Тулик маълумот',
            'add_info' => 'Кушимча маълумот',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password2' => 'Парольни тасдикланг',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Murojats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMurojats()
    {
        return $this->hasMany(Murojats::className(), ['deputat_id' => 'id']);
    }

    public static function getNameByUserId($user_id){
        $model = self::find()->where(['user_id'=>$user_id])->one();
        if($model){
            return $model->name;
        }
        else{
            return 'ФИШ топилмади хозирча';
        }
    }

    public static function getOkrugName($user_id){
        $model = self::find()->where(['user_id'=>$user_id])->one();
        if($model){
            return $model->okrug_id;
        }
        else{
            return 'Округ маълумоти';
        }
    }

    public static function getAll(){
        $models = ArrayHelper::map(self::find()->all(), 'id', 'name'); 
        return $models;
    }
    
}
