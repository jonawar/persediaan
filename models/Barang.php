<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id
 * @property string $nama_barang
 * @property string $jenis_barang
 * @property string $keterangan
 * @property int $status
 * @property string $created_at
 * @property string $edited_at
 * @property string $deleted_at
 *
 * @property StokBarang[] $stokBarangs
 * @property TransaksiBarang[] $transaksiBarangs
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'edited_at', 'deleted_at'], 'safe'],
            [['nama_barang', 'jenis_barang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_barang' => 'Nama Barang',
            'jenis_barang' => 'Jenis Barang',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
            'created_at' => 'Created At',
            'edited_at' => 'Edited At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStokBarangs()
    {
        return $this->hasMany(StokBarang::className(), ['id_barang' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBarangs()
    {
        return $this->hasMany(TransaksiBarang::className(), ['barang_id' => 'id']);
    }
}
