<?php
/**
 * Created by PhpStorm.
 * User: Rafe
 * Date: 13/11/2017
 * Time: 20:18
 */

namespace app\controllers;

use app\models\StudyClass;
use yii\rest\ActiveController;

class ClassapiController extends ActiveController
{
    public $modelClass = 'app\models\StudyClass';

    public function actionGetStudents($id){
        $study_class = StudyClass::findOne(['id'=>$id]);
        $students = $study_class->studyClassStudents;

        $response = [];
        foreach($students as $student){
            $response[] = [
                'id'=>$student->student->user->id,
                'forename'=>$student->student->user->forename,
                'surname'=>$student->student->user->surname,
                'email'=>$student->student->user->email,
            ];
        }

        return $response;
    }

    public function actionGetTeacher($id){
        $study_class = StudyClass::findOne(['id'=>$id]);
        return $study_class->teacher->user;
    }

    public function actionGetAll($id){
        $study_class = StudyClass::findOne(['id'=>$id]);
        $students = $study_class->studyClassStudents;
        $teacher = $study_class->teacher;

        $response = [
            'id'=>$id,
            'teacher'=>[
                'id'=>$teacher->id,
                'forename'=>$teacher->user->forename,
                'surname'=>$teacher->user->surname,
                'email'=>$teacher->user->email,
            ],
        ];

        $details = [];
        foreach($students as $student){
            $details[] = [
                'id'=>$student->student->user->id,
                'forename'=>$student->student->user->forename,
                'surname'=>$student->student->user->surname,
                'email'=>$student->student->user->email,
            ];
        }

        $response['students'] = $details;

        return $response;
    }
}