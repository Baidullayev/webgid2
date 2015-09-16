<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
class Stationsoftheregion extends ActiveRecord
{

    public function getStationList()
    {
        $allStations = Stationsoftheregion::find()->asArray()->orderBy("p_nom DESC")->all();
        return $allStations;
        // arrayHelper::map($allStations, 'p_nom', 'kod_stan','name_stan','vr_ch','vr_n','rast_ch','ot','kput','podhod','kod_uchast','k_dor','kod_otd','pr_kn_uch','pr_dop_puti');
    }
}


?>

