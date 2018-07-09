<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/imagens/EEUM.ico" type="image/x-icon" />
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap wrap-custom">
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="../web/imagens/logo.jpg" class="img-responsive main-logo"/>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-1 navbar-fixed-top',
                ],
            ]);
//            $menuItems = [
//                    ['label' => 'Home', 'url' => ['/site/index']],
//            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = [
                    'label' => 'Login', 'url' => '../../backend/web/index.php',
                ];
//                $menuItems[] = [
//                    'label' => 'Login', 'url' => ['/site/login'],
//                ];
            } else {
                $menuItems[] = '<li><a>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</a></li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right navbar-content'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?php
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
        <footer class="footer footer-content">
            <div class="container">
                <p class="pull-left">&copy; CPEEUM <?= date('Y') ?></p>

            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>