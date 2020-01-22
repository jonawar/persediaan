<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stok_barang".
 *
 * @property int $id
 * @property int $id_barang
 * @property int $stok
 * @property string $updated_date
 *
 * @property Barang $barang
 */
class StokBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stok_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'stok', 'updated_date'], 'required'],
            [['id_barang', 'stok'], 'integer'],
            [['updated_date'], 'safe'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang' => 'Id Barang',
            'stok' => 'Stok',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_barang']);
    }
}
