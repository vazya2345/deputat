<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "murojats".
 *
 * @property int $id
 * @property int $deputat_id
 * @property string $murojatchi_name
 * @property string $murojatchi_contact
 * @property string $murojat_text
 * @property string|null $javob
 * @property int|null $status
 * @property string|null $create_date
 * @property string|null $mod_date
 *
 * @property Deputats $deputat
 */
class Murojats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'murojats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deputat_id', 'murojatchi_name', 'murojatchi_contact', 'murojat_text'], 'required'],
            [['deputat_id', 'status'], 'integer'],
            [['murojat_text', 'javob'], 'string'],
            [['create_date', 'mod_date'], 'safe'],
            [['murojatchi_name', 'murojatchi_contact'], 'string', 'max' => 255],
            [['deputat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deputats::className(), 'targetAttribute' => ['deputat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Мурожаат раками',
            'deputat_id' => 'Депутат',
            'murojatchi_name' => 'Мурожаатчининг исм-шарифи',
            'murojatchi_contact' => 'Мурожаатчининг контакти',
            'murojat_text' => 'Мурожаат матни',
            'javob' => 'Мурожаатга жавоб',
            'status' => 'Бажарилиши',
            'create_date' => 'Яратилган сана',
            'mod_date' => 'Янгиланган сана',
        ];
    }

    /**
     * Gets query for [[Deputat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeputat()
    {
        return $this->hasOne(Deputats::className(), ['id' => 'deputat_id']);
    }
}
