<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/imagens/EE.ico" type="image/x-icon" />
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
            /*
              NavBar::begin([
              'brandLabel' => '<img src="../web/imagens/logo.jpg" class="img-responsive main-logo"/>',
              'brandUrl' => Yii::$app->homeUrl,
              'options' => [
              'class' => 'navbar-1 navbar-fixed-top',
              ],
              ]);
              $menuItems = [
              ['label' => 'Home', 'url' => ['/site/index']],
              ];
              if (Yii::$app->user->isGuest) {
              $menuItems[] = [
              'label' => 'Frontend', 'url' => '../../frontend/web/index.php',
              ];
              $menuItems[] = [
              'label' => 'Login', 'url' => ['/site/login']
              ];
              } else {
              $menuItems[] = [
              'label' => 'Ações',
              'items' => [
              //'<li class="dropdown-header">Administradores</li>',
              ['label' => 'Administradores', 'url' => 'index.php?r=user/index'],
              '<li class="divider"></li>',
              //'<li class="dropdown-header">Docentes</li>',
              ['label' => 'Docentes', 'url' => ['/Docente/docente']],
              //['label' => '#Importar Lista de Docentes', 'url' => ['/Docente/docente']],
              '<li class="divider"></li>',
              //'<li class="dropdown-header">Programas Doutorais</li>',
              ['label' => 'Programas Doutorais', 'url' => 'index.php?r=programa/index'],
              '<li class="divider"></li>',
              ['label' => 'Alunos', 'url' => 'index.php?r=aluno/index'],
              '<li class="divider"></li>',
              '<li class="dropdown-header">Unidades Curriculares</li>',
              ['label' => 'Nível 1', 'url' => 'index.php?r=uc_1'],
              ['label' => 'Nível Zero', 'url' => 'index.php?r=uc_0'],
              ],
              ];
              $menuItems[] = '<li><a>'
              . Html::beginForm(['/site/logout'], 'post')
              . Html::submitButton(
              'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-default btn-lg"']
              //'Logout', ['class' => 'btn btn-default btn-lg"']
              )
              . Html::endForm()
              . '</a></li>';
              }
              echo Nav::widget([
              'options' => ['class' => 'navbar-nav navbar-right navbar-content'],
              'items' => $menuItems,
              ]);
              NavBar::end();
             * 
             */
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => '<i class="glyphicon glyphicon-cog"></i> Gest3',
                'items' => [
                        [
                        'url' => '#',
                        'label' => 'Home',
                        'icon' => 'home'
                    ],
                        [
                        'label' => 'Help',
                        'icon' => 'question-sign',
                        'items' => [
                                ['label' => 'About', 'icon' => 'info-sign', 'url' => '#'],
                                ['label' => 'Contact', 'icon' => 'phone', 'url' => '#'],
                        ],
                    ],
                ],
            ]);
            ?>
            <div class="container">
                <?=
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
