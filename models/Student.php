<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_student".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property TblUser $user
 * @property TblStudyClassStudent[] $tblStudyClassStudents
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyClassStudents()
    {
        return $this->hasMany(StudyClassStudent::className(), ['student_id' => 'id']);
    }
}
