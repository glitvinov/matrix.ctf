<?php
/* @var $this SiteController */
/* @var $check */
/* @var $model Users */

$this->pageTitle=Yii::app()->name;
?>

<?php if ($check == 1) echo '<div style="padding: 100px;" > <h1>ID cannot be empty.</h1> </div>' ?>
<?php if ($check == 2) echo '<div style="padding: 100px;" > <h1>This user does not exist.</h1> </div>' ?>

<?php if($check == 0): ?>
<div style="padding: 100px;">
    <div class="form-horizontal" style="padding: 50px; border: 1px solid grey; border-radius: 10px">
<?php
echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3>ID user:</h3></div>';
echo '<div class="col-sm-6"><h3>'. $model->id .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3>Nick:</h3></div>';
echo '<div class="col-sm-6"><h3>'. $model->nick .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3>Email:</h3></div>';
echo '<div class="col-sm-6"><h3>'. $model->email .'</h3></div>';
echo '</div>';
?>
    </div>
</div>

<?php endif; ?>