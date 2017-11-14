<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_study_class".
 *
 * @property integer $id
 * @property string $class_name
 * @property integer $teacher_id
 *
 * @property TblTeacher $teacher
 * @property TblStudyClassStudent[] $tblStudyClassStudents
 */
class StudyClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_study_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name', 'teacher_id'], 'required'],
            [['teacher_id'], 'integer'],
            [['class_name'], 'string', 'max' => 255],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
            'teacher_id' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyClassStudents()
    {
        return $this->hasMany(StudyClassStudent::className(), ['study_class_id' => 'id']);
    }
}
