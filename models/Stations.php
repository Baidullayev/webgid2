<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%stationsoftheregion}}".
 *
 * @property integer $p_nom
 * @property string $kod_stan
 * @property string $name_stan
 * @property integer $vr_ch
 * @property integer $vr_n
 * @property integer $rast_ch
 * @property integer $ot
 * @property integer $kput
 * @property integer $podhod
 * @property string $kod_uchast
 * @property string $k_dor
 * @property string $kod_otd
 * @property integer $pr_kn_uch
 * @property integer $pr_dop_puti
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stationsoftheregion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_nom', 'kod_stan', 'name_stan', 'vr_ch', 'vr_n', 'rast_ch', 'ot', 'kput', 'podhod', 'kod_uchast', 'k_dor', 'kod_otd', 'pr_kn_uch', 'pr_dop_puti'], 'required'],
            [['p_nom', 'vr_ch', 'vr_n', 'rast_ch', 'ot', 'kput', 'podhod', 'pr_kn_uch', 'pr_dop_puti'], 'integer'],
            [['kod_stan'], 'string', 'max' => 6],
            [['name_stan'], 'string', 'max' => 15],
            [['kod_uchast', 'k_dor', 'kod_otd'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_nom' => 'P Nom',
            'kod_stan' => 'KodStan',
            'name_stan' => 'NameStan',
            'vr_ch' => 'VrCh',
            'vr_n' => 'VrN',
            'rast_ch' => 'RastCh',
            'ot' => 'Ot',
            'kput' => 'Kput',
            'podhod' => 'Podhod',
            'kod_uchast' => 'KodUchast',
            'k_dor' => 'KDor',
            'kod_otd' => 'KodOtd',
            'pr_kn_uch' => 'PrKnUch',
            'pr_dop_puti' => 'PrDopPuti',
        ];
    }
    public function getStationList()
    {
        $allStations = Stations::find()->asArray()->orderBy("p_nom DESC")->all();
        return $allStations;
        // arrayHelper::map($allStations, 'p_nom', 'kod_stan','name_stan','vr_ch','vr_n','rast_ch','ot','kput','podhod','kod_uchast','k_dor','kod_otd','pr_kn_uch','pr_dop_puti');
    }
}
