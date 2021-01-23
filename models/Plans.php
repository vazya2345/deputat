<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property int $deputat_id
 * @property string $plan
 * @property string|null $baj
 * @property string|null $baj_date
 * @property string|null $ocenka
 * @property int|null $status
 * @property string|null $create_date
 * @property string|null $mod_date
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deputat_id', 'plan'], 'required'],
            [['deputat_id', 'status'], 'integer'],
            [['plan', 'baj', 'ocenka'], 'string'],
            [['baj_date', 'create_date', 'mod_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deputat_id' => 'Deputat ID',
            'plan' => 'Plan',
            'baj' => 'Baj',
            'baj_date' => 'Baj Date',
            'ocenka' => 'Ocenka',
            'status' => 'Status',
            'create_date' => 'Create Date',
            'mod_date' => 'Mod Date',
        ];
    }
}
