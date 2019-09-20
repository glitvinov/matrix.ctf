<?php
/* @var $this SiteController */

/* @var $check */
/* @var $photo */
/* @var $model Users */

$this->pageTitle=Yii::app()->name;
?>

<?php if ($check == 1) echo '<div style="padding: 100px;" > <h1>This user does not exist.</h1> </div>' ?>

<?php if($check == 0): ?>
<div style="padding: 100px;">
    <div class="form-horizontal" style="padding: 50px; border: 1px solid grey; border-radius: 10px">
<?php

echo Users::showAttribute($model,'nick');
echo Users::showAttribute($model,'email');
echo Users::showAttribute($model,'tel');
echo Users::showAttribute($model,'sex');
echo Users::showAttribute($model,'role');
echo Usres::showAttribute($model,'info');
echo Users::showAttribute($model,'city');
echo Users::showAttribute($model,'site');
echo Usres::showAttribute($model,'lvlup');

if($photo != '') {
    echo '<div class="form-group">
        <div class="col-sm-4" name="title-\'.$attr.\'"><h3 style="margin: 0px; text-decoration: underline;">Photo:</h3></div>
        <div class="col-sm-6" name="\'.$attr.\'"><h3 style="margin: 0px;">' . '<img src="' . $photo . '" width="200px">' . '</h3></div>
    </div>';
}

?>
    </div>
</div>

<?php endif; ?>