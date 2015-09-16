<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nonstandartways".
 *
 * @property integer $id
 * @property string $kod_st
 * @property string $n_puti_gr
 * @property string $naim_puti
 * @property integer $n_puti_pass
 */
class Nonstandartways extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nonstandartways';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kod_st', 'n_puti_gr', 'naim_puti', 'n_puti_pass'], 'required'],
            [['id', 'n_puti_pass'], 'integer'],
            [['kod_st'], 'string', 'max' => 6],
            [['n_puti_gr'], 'string', 'max' => 2],
            [['naim_puti'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kod_st' => 'Kod St',
            'n_puti_gr' => 'N Puti Gr',
            'naim_puti' => 'Naim Puti',
            'n_puti_pass' => 'N Puti Pass',
        ];
    }
    
}
