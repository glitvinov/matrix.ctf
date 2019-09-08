<?php
/* @var $this SiteController */
/* @var $model Users */

$this->pageTitle=Yii::app()->name." - Login";
?>


<div id="mainForm" style="padding: 100px; padding-top: 20px; padding-bottom: 50px">
    <div class="form" style="padding: 50px; border: 1px solid grey; border-radius: 10px">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'type'=>'horizontal',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nick',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'nick',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'nick',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->passwordField($model,'password',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'password',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'email',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'email',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'tel',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'tel',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'tel',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'sex',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5 form-inline">
            <?php echo $form->dropDownList($model,'sex',array('M' => 'Male', 'F' => 'Female' ),array('style'=>'width: 100%; height:auto')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'sex',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'info',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textArea($model,'info',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'info',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'city',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'city',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'city',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'site',array('class' => 'col-sm-2', 'style'=>'font-weight: bold;')); ?>
        <div class="col-sm-5">
            <?php echo $form->textField($model,'site',array('style'=>'width: 100%;')); ?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->error($model,'site',array('style'=>'font-weight: bold;')); ?>
        </div>
    </div>

    <div class="form-inline">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton('Registration', array('class' => 'btn btn-default')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>
    </div>
</div>


</div>