<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $create_date
 * @property string $last_updated
 * @property string $email
 * @property string $forename
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property integer $admin
 *
 * @property TblStudent[] $tblStudents
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'email', 'forename', 'surname', 'username', 'password'], 'required'],
            [['create_date', 'last_updated'], 'safe'],
            [['admin'], 'integer'],
            [['email', 'username'], 'string', 'max' => 255],
            [['forename', 'surname', 'password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_date' => 'Create Date',
            'last_updated' => 'Last Updated',
            'email' => 'Email',
            'forename' => 'Forename',
            'surname' => 'Surname',
            'username' => 'Username',
            'password' => 'Password',
            'admin' => 'Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['user_id' => 'id']);
    }

    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['user_id' => 'id']);
    }
}
