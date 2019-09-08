<?php
/* @var $this SiteController */
/* @var $role */
/* @var $data */

$this->pageTitle=Yii::app()->name;
?>

<?php
if(in_array($role, array('Guest'))):
?>

<div style="padding: 100px;" >
    <h1>Welcome to "<?= CHtml::encode(Yii::app()->name)?>"</h1>
    <h3><p>You need to log in to be in the system</p></h3>
</div>

<?php
else:
?>

    <div style="padding: 100px;" >
        <h1>Welcome to "<?= CHtml::encode(Yii::app()->name)?>"</h1>
        <h3><p>You can find a user using his nickname</p></h3>
        <form action="index.php?r=site/index" method="post">
            <input name="search" type="text" class="form-control" style="margin-bottom: 0px; width: 70%;">
            <input name="Button" type="submit" class="btn" value="Find">
        </form>
    </div>

<?php endif; ?>

<?php
if(!empty($data['searchProfile'])){
    echo "<hr/><h2>Find</h2>";
    foreach ($data['searchProfile'] as $one){
        $block = "<div style='height: 140px;  border: 1px solid grey; border-radius: 10px; margin-left: 150px; margin-right: 150px;'>";
            $block .= "<div class=\"form-horizontal col-sm-3\">";
                $block .= "<div style='width: 100px; height: 100px; border: 1px solid grey; border-radius: 10px; background-color: #b4d8b4; margin: 20px;'>";
                $block .= "<a href='index.php?r=site/profile&id=".$one['id']."' style='color: black; text-decoration: none;'>"
                    ."<h1 style='margin: 0px; padding: 25px;'>".strtoupper($one['nick'][0])."</h1></a>";
                $block .= "</div>";
            $block .= "</div>";
            $block .= "<div class=\"form-horizontal col-sm-5\" style='text-align: left; padding: 30px;'>";
                $block .= "<div style='width: 100%;'>";
                $block .= "<h4>Nick: ".$one['nick']."</h4>";
                $block .= "</div>";
                $block .= "<div>";
                $block .= "<h4>Role: ".$one['role']."</h4>";
                $block .= "</div>";
            $block .= "</div>";

            $block .= "<div class=\"form-horizontal col-sm-1\" style='padding-top: 100px;'>";
                $block .= "<a href='index.php?r=site/profile&id=".$one['id']."'><input type='submit' value='Profile' class='btn btn-info'></a>";
            $block .= "</div>";
        $block .= "</div>";
        echo "<div style=\"padding: 20px;\" >".$block."</div>";
    }
}
?>



