<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' =>"{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'password',
            'name',
            [
                'format' => 'raw',
                'attribute'=>'activated',
                'value'=>function($model){
                    return empty($model->password) ? "Установите пароль":
                        ($model->activated ? 
                            Html::a('<i class="glyphicon glyphicon-minus-sign"> Деактивировать</i>', ['activate', 'id'=>$model->id, 'activate'=>false],["class"=>"btn btn-sm btn-warning", 'style'=>'margin: -7px 0']) : 
                            Html::a('<i class="glyphicon glyphicon-plus-sign"> Активировать</i>', ['activate', 'id'=>$model->id, 'activate'=>true],["class"=>"btn btn-sm btn-success", 'style'=>'margin: -7px 0']));
                }
            ],
            // 'admin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
