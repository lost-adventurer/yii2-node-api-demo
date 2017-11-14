<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudyClass */

$this->title = 'Create Study Class';
$this->params['breadcrumbs'][] = ['label' => 'Study Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
