<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div style="background: rgba(255, 255, 255, 0.7); padding: 100px;" >
    <h1>Добро пожаловать в  "<?= CHtml::encode(Yii::app()->name)?>"</h1>
    <h3><p>Вы можете найти пользователя по его нику</p></h3>
    <input type="text" class="form-control" style="margin-bottom: 0px; width: 70%">
    <input type="button" class="btn btn-primary" value="Искать">
</div>