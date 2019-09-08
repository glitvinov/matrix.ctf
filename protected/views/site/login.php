<?php
/* @var $this SiteController */
/* @var $model LoginForm */

$this->pageTitle=Yii::app()->name." - Login";
?>


<div id="mainForm" style="padding: 100px; " >
    <div class="form" style="padding: 50px; border: 1px solid grey; border-radius: 10px">

        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'type'=>'horizontal',
        )); ?>

        <h3 style="color: red"><?= ($error)?'Authorisation Error.':'' ?></h3>
        <div class="form-group">
            <?php echo $form->labelEx($model,'nick',array('class' => 'col-sm-4', 'style'=>'font-weight: bold;')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model,'nick',array('style'=>'width: 100%;')); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'password',array('class' => 'col-sm-4', 'style'=>'font-weight: bold;')); ?>
            <div class="col-sm-6">
                <?php echo $form->passwordField($model,'password',array('style'=>'width: 100%;')); ?>
            </div>
        </div>

        <div class="form-inline">
            <div class="col-sm-offset-2 col-sm-8" style="text-align: right;">
                <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-default')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>