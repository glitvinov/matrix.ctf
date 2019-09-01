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
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Nick:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->nick .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Email:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->email .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Telephone:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->tel .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Sex:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->getSex() .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Role:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->role .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Info:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->info .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">City:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->city .'</h3></div>';
echo '</div>';

echo '<div class="form-group">';
echo '<div class="col-sm-4"><h3 style="margin: 0px; text-decoration: underline;">Site:</h3></div>';
echo '<div class="col-sm-6"><h3 style="margin: 0px;">'. $model->site .'</h3></div>';
echo '</div>';
?>
    </div>
</div>

<?php endif; ?>