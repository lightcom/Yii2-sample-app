<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'shared')->textInput() ?>

    <?= $form->field($model, 'mimetype')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'systime')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 400]) ?>

    <?= $form->field($model, 'users_id')->textInput() ?>

    <?= $form->field($model, 'sections_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
