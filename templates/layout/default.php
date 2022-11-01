<?php

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<!-- 
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head> -->
<?= $this->element('head') ?>

<body>
    <div class="container-scroller">
        <div class="sidebar sidebar-offcanvas" id="sidebar">
            <?= $this->element('menu') ?>
        </div>
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <?= $this->element('header') ?>
            </nav>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                    <footer class="footer">
                        <?= $this->fetch('footer') ?>
                    </footer>
                </div>

            </div>
        </div>
    </div>



</body>

</html>