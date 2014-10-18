<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Section */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>
    
    <?= $form->field($model, 'parent_id')->textInput(['readonly'=>true]) ?>
    
    <?php $parent = \app\models\Section::findOne($model->parent_id);
        if($parent != null) {
            echo '<div class="form-group field-section-parent_id required">';
            echo '<label class="control-label" for="section-parent_id">Родитель</label>';
            echo Html::input("text", null, $parent->name, ['disabled'=>'disabled', 'class'=>'form-control']);
            echo '<div class="help-block"></div>';
            echo '</div>';
        }
    ?>
    
    <?= $form->field($model, 'lvl')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
