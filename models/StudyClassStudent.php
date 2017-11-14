<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_study_class_student".
 *
 * @property integer $id
 * @property integer $study_class_id
 * @property integer $student_id
 *
 * @property TblStudent $student
 * @property TblStudyClass $studyClass
 */
class StudyClassStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_study_class_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['study_class_id', 'student_id'], 'required'],
            [['study_class_id', 'student_id'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['study_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudyClass::className(), 'targetAttribute' => ['study_class_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'study_class_id' => 'Study Class ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyClass()
    {
        return $this->hasOne(StudyClass::className(), ['id' => 'study_class_id']);
    }
}
