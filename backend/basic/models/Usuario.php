<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $email
 * @property string|null $password
 * @property string|null $auth_key_token
 *
 * @property Permiso[] $permisos
 * @property UsuarioPermiso[] $usuarioPermisos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'auth_key_token'], 'string'],
            [['username', 'nombre', 'apellido', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'password' => 'Password',
            'auth_key_token' => 'Auth Key Token',
        ];
    }

    /**
     * Gets query for [[Permisos]].
     *
     * @return \yii\db\ActiveQuery|PermisoQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permiso::className(), ['id' => 'permiso_id'])->viaTable('usuario_permiso', ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioPermisos]].
     *
     * @return \yii\db\ActiveQuery|UsuarioPermisoQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }
}
