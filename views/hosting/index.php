<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

if($activate) $this->title = "Активация";
else $this->title = "Деактивация";
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activate">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->title ?> пользователя <strong><?= $model->name." ( $model->email )" ?></strong> прошла успешно.<br/>
    Пользователю отправлено оповещение на электронную почту.

</div>
