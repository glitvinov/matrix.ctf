<?php
/* @var $this SiteController */
/* @var $model LoginForm */

$this->pageTitle=Yii::app()->name." - Login";
?>


<div style="padding: 100px; padding-bottom: 50px" >
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="roleChoice" title="Worker" style="border: ridge;"><a href="#" style="color: black"><h3>Worker</h3></a></li>
        <li role="presentation" class="roleChoice" title="Manager" style="border: ridge;"><a href="#" style="color: black"><h3>Manager</h3></a></li>
    </ul>
</div>

<div id="mainForm" style="padding: 100px; padding-top: 20px; display: none;">

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

    <div class="form-inline">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="form-group">
                <?php echo $form->textField($model,'role',array('style'=>'display: none;')); ?>
                <?php echo $form->error($model,'role'); ?>
            </div>
            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-default')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>

<script>
    $(document).on('click', '.roleChoice', function (e) {
        var allElem = document.getElementsByClassName('roleChoice');
        for (var i=0; i<allElem.length; i++) allElem[i].className = 'roleChoice';
        $(this).addClass('active');
        document.getElementById('mainForm').style.display = '';
        document.getElementById('Users_role').value = $(this).prop('title');
    });
</script>

</div>