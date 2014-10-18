<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'shared') ?>

    <?= $form->field($model, 'mimetype') ?>

    <?= $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'systime') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'users_id') ?>

    <?php // echo $form->field($model, 'sections_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
