<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudyClass */

$this->title = 'Update Study Class: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Study Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="study-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
