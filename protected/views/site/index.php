<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div style="padding: 100px;" >
    <h1>Welcome to "<?= CHtml::encode(Yii::app()->name)?>"</h1>
    <h3><p>You can find a user his nickname</p></h3>
    <form action="index.php?r=site/index" method="post">
        <input name="search" type="text" class="form-control" style="margin-bottom: 0px; width: 70%;">
        <input type="submit" class="btn" value="Find">
    </form>
</div>

