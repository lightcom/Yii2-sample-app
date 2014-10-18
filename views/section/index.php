<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Разделы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать раздел', ['create', 'lvl' => 1], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' =>"{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'enableSorting' => false,
                'value' => function ($model) {
                    $spaces = "";
                    for($ii=1; $ii<$model->lvl; $ii++) $spaces.="&nbsp;&nbsp;";
                    return $spaces.$model->name;
                },
            ],
            [
                'attribute' => 'parent_id',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'lvl',
                'enableSorting' => false,
            ],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('<i class="glyphicon glyphicon-plus"></i>',['create', 'parent_id'=>$model->id]);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); ?>

</div>
