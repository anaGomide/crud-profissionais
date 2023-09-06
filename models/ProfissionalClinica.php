<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profissional_clinica".
 *
 * @property int $id
 * @property int $profissional_id
 * @property int $clinica_id
 *
 * @property Clinica $clinica
 * @property Profissional $profissional
 */
class ProfissionalClinica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profissional_clinica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profissional_id', 'clinica_id'], 'required'],
            [['profissional_id', 'clinica_id'], 'integer'],
            [['profissional_id', 'clinica_id'], 'unique', 'targetAttribute' => ['profissional_id', 'clinica_id']],
            [['profissional_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profissional::class, 'targetAttribute' => ['profissional_id' => 'ID']],
            [['clinica_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinica::class, 'targetAttribute' => ['clinica_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profissional_id' => 'Profissional ID',
            'clinica_id' => 'Clinica ID',
        ];
    }

    /**
     * Gets query for [[Clinica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinica()
    {
        return $this->hasOne(Clinica::class, ['id' => 'clinica_id']);
    }

    /**
     * Gets query for [[Profissional]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissional()
    {
        return $this->hasOne(Profissional::class, ['ID' => 'profissional_id']);
    }
}
