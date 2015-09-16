<?php

namespace app\models;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "approaches".
 *
 * @property integer $id_podhod
 * @property string $st_sov
 * @property integer $n_pod
 * @property string $st_prim
 * @property string $kod_uchast_r
 * @property string $kod_otd_r
 * @property string $k_dor_r
 * @property string $esr_napr
 * @property integer $chr_napr_p
 * @property integer $ch_napr_o
 */
class Approaches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approaches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_sov', 'n_pod', 'st_prim', 'kod_uchast_r', 'kod_otd_r', 'k_dor_r', 'esr_napr', 'chr_napr_p', 'ch_napr_o'], 'required'],
            [['n_pod', 'chr_napr_p', 'ch_napr_o'], 'integer'],
            [['st_sov', 'esr_napr'], 'string', 'max' => 6],
            [['st_prim'], 'string', 'max' => 15],
            [['kod_uchast_r', 'kod_otd_r', 'k_dor_r'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_podhod' => 'Id Podhod',
            'st_sov' => 'St Sov',
            'n_pod' => 'N Pod',
            'st_prim' => 'St Prim',
            'kod_uchast_r' => 'Kod Uchast R',
            'kod_otd_r' => 'Kod Otd R',
            'k_dor_r' => 'K Dor R',
            'esr_napr' => 'Esr Napr',
            'chr_napr_p' => 'Chr Napr P',
            'ch_napr_o' => 'Ch Napr O',
        ];
    }
    public function getApproachesList()
    {
        $droptions = Approaches::find()->asArray()->all();

        return ArrayHelper::map($droptions,'id_podhod','st_sov');
        
    }
}
