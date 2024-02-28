<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_alat".
 *
 * @property int $id_item
 * @property int|null $id_alat
 * @property string|null $no_inv
 * @property string|null $ruangan
 * @property string|null $tahun_pembelian
 * @property string|null $harga
 * @property string|null $created
 * @property int|null $createdBy
 * @property string|null $modified
 * @property int|null $modifiedBy
 *
 * @property Alat $alat
 * @property Maintenance[] $maintenances
 */
class ItemAlat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_alat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alat', 'createdBy', 'modifiedBy'], 'integer'],
            [['tahun_pembelian', 'created', 'modified'], 'safe'],
            [['no_inv'], 'string', 'max' => 100],
            [['ruangan'], 'string', 'max' => 50],
            [['harga'], 'string', 'max' => 255],
            [['id_alat'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::class, 'targetAttribute' => ['id_alat' => 'id_alat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item' => 'Id Item',
            'id_alat' => 'Id Alat',
            'no_inv' => 'No Inv',
            'ruangan' => 'Ruangan',
            'tahun_pembelian' => 'Tahun Pembelian',
            'harga' => 'Harga',
            'created' => 'Created',
            'createdBy' => 'Created By',
            'modified' => 'Modified',
            'modifiedBy' => 'Modified By',
        ];
    }

    /**
     * Gets query for [[Alat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlat()
    {
        return $this->hasOne(Alat::class, ['id_alat' => 'id_alat']);
    }

    /**
     * Gets query for [[Maintenances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenances()
    {
        return $this->hasMany(Maintenance::class, ['id_item' => 'id_item']);
    }
}
