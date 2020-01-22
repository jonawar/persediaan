<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_barang".
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $barang_id
 * @property int $qty
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 *
 * @property Barang $barang
 * @property Vendor $vendor
 */
class TransaksiBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vendor_id', 'barang_id', 'qty', 'status', 'created_at'], 'required'],
            [['vendor_id', 'barang_id', 'qty', 'status', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['barang_id' => 'id']],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_id' => 'Vendor ID',
            'barang_id' => 'Barang ID',
            'qty' => 'Qty',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }
}
