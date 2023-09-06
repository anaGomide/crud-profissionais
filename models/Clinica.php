<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clinica".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string $endereco
 *
 * @property ProfissionalClinica[] $profissionalClinicas
 * @property Profissional[] $profissionals
 */
class Clinica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clinica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj', 'endereco'], 'required'],
            [['nome', 'endereco'], 'string', 'max' => 255],
            [['cnpj'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cnpj' => 'Cnpj',
            'endereco' => 'Endereco',
        ];
    }

    /**
     * Gets query for [[ProfissionalClinicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissionalClinicas()
    {
        return $this->hasMany(ProfissionalClinica::class, ['clinica_id' => 'id']);
    }

    /**
     * Gets query for [[Profissionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissionals()
    {
        return $this->hasMany(Profissional::class, ['ID' => 'profissional_id'])->viaTable('profissional_clinica', ['clinica_id' => 'id']);
    }
}
