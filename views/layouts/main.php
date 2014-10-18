<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="container">
        <div class="header">
            <?php
                $is_admin=false;
                $auth = Yii::$app->authManager;
                $roles = $auth->getRolesByUser(Yii::$app->user->getId());
                if(array_key_exists("admin", $roles)) $is_admin = true;
                echo Nav::widget([
                    'options' => ['class' => 'nav nav-pills pull-right'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'О сервисе', 'url' => ['/site/about']],
                        $is_admin ?
                            ['label' => 'Разделы', 'url' => ['/section/index']] :
                            ['label' => ''],
                        $is_admin ?
                            ['label' => 'Пользователи', 'url' => ['/user/index']] :
                            ['label' => ''],
                        Yii::$app->user->isGuest ?
                            ['label' => ''] :
                            ['label' => 'Файлы', 'url' => ['/hosting/index']],
                        Yii::$app->user->isGuest ?
                            ['label' => ''] :
                            ['label' => 'Выйти (' . Yii::$app->user->identity->name . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post']],
                    ],
                ]);
            ?>
            <h3 class="text-muted">Файл-хостинг Компании "Name"</h3>
        </div>
        <div class="container" style="height:100%;">
            <br/>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div> <!-- /container -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>