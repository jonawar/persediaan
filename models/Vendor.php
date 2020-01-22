<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property int $status
 * @property string $created_date
 * @property string $updated_at
 *
 * @property TransaksiBarang[] $transaksiBarangs
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'created_date', 'updated_at'], 'required'],
            [['status'], 'integer'],
            [['created_date', 'updated_at'], 'safe'],
            [['nama', 'alamat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBarangs()
    {
        return $this->hasMany(TransaksiBarang::className(), ['vendor_id' => 'id']);
    }
}
