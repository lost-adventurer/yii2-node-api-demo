<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudyClassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Study Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-class-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Study Class', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class_name',
            'teacher_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
