<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profissional".
 *
 * @property int $ID
 * @property string $Nome
 * @property string $Conselho
 * @property string $NumeroConselho
 * @property string $Nascimento
 * @property string $Status
 *
 * @property Clinica[] $clinicas
 * @property ProfissionalClinica[] $profissionalClinicas
 */
class Profissional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profissional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Conselho', 'NumeroConselho', 'Nascimento', 'Status'], 'required'],
            [['Conselho', 'Status'], 'string'],
            [['Nascimento'], 'safe'],
            [['Nome'], 'string', 'max' => 255],
            [['NumeroConselho'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nome' => 'Nome',
            'Conselho' => 'Conselho',
            'NumeroConselho' => 'Numero Conselho',
            'Nascimento' => 'Nascimento',
            'Status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Clinicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinicas()
    {
        return $this->hasMany(Clinica::class, ['id' => 'clinica_id'])->viaTable('profissional_clinica', ['profissional_id' => 'ID']);
    }

    /**
     * Gets query for [[ProfissionalClinicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissionalClinicas()
    {
        return $this->hasMany(ProfissionalClinica::class, ['profissional_id' => 'ID']);
    }
}
