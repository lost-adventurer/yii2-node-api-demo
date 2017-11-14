<?php
/**
 * Created by PhpStorm.
 * User: Rafe
 * Date: 13/11/2017
 * Time: 19:25
 */

// commands/SeedController.php
namespace app\commands;

use yii\console\Controller;
use app\models\User;
use app\models\Student;
use app\models\Teacher;
use app\models\StudyClass;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        $user = new User();
        $student = new Student();
        $teacher = new Teacher();
        $study_class = new StudyClass();

        for ( $i = 1; $i <= 20; $i++ )
        {
            $user->setIsNewRecord(true);
            $user->id = null;
            $user->create_date = $faker->dateTime()->format('Y-m-d H:i:s');
            $user->email = $faker->email;
            $user->forename = $faker->firstName;
            $user->surname = $faker->lastName;
            $user->username = $faker->userName;
            $user->password = '123456';

            if ( $user->save() )
            {
                $student->setIsNewRecord(true);
                $student->id = null;
                $student->user_id = null;

                $student->user_id = $user->id;
                $student->save();

                if($i == 5 or $i == 10 or $i == 15){
                    $teacher->setIsNewRecord(true);
                    $teacher->id = null;
                    $teacher->user_id = null;

                    $teacher->user_id = $user->id;
                    $teacher->save();
                }
            }
        }

    }
}