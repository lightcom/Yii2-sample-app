<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Главная';

$col = Yii::$app->user->isGuest ? "col-lg-9" : "";
$hide = Yii::$app->user->isGuest ? "" : "style='display:none'";
?>
<div class="site-index">
    <div class="col-lg-3" <?= $hide ?>>
        <div class="jumbotron" style="padding: 20px">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'action' => ['site/login'],
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'control-label'],
                        ],
            ]);
            ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?=
            $form->field($model, 'rememberMe')->checkbox()
            ?>

            <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
            
            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
            </div>
                <?= Html::a("Регистрация", ["register"], ['class'=>"btn btn-default"]) ?>
            <br/><br/>
            <?= Html::a("Забыли пароль?", "") ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="<?= $col ?>" style="text-align: center; padding-top: 90px;">
        <img class="" src="<?php echo Url::base()?>/img/cloud8.jpg" alt="test pic"/>
    </div>
</div>
