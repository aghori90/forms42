<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Devlopment:';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('base-responsive.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('slicknav.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?php $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('monthpicker'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->Html->script('Chart'); ?>
    <?php echo $this->Html->script('moment.min'); ?>
    <?php echo $this->Html->script('popper.min'); ?>
    <?php echo $this->Html->script('monthpicker.min'); ?>
    <?php echo $this->Html->script('jquery'); ?>
    <?php echo $this->Html->script('sha1.js') ?>
    <?php echo $this->Html->script('fontawesome'); ?>
</head>
<body onLoad="createCaptcha()">
    <div style="display:none;">
		<h1>Heading1</h1><h2>Heading2</h2>
	</div>
    <?php echo $this->Element('top_bar'); ?>
    <?php echo $this->Element('menu'); ?>
    <?= $this->Flash->render() ?>
    <!-- <div class="container clearfix">
        <?php //echo $this->fetch('content'); ?>
    </div> -->
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <?php echo $this->Element('footer'); ?>
</body>
</html>
