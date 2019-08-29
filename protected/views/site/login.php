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
    <form class="form-horizontal">

        <div class="form-group">
            <label for="inputNick" class="col-sm-2 control-label"><b>Nick</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputNick" placeholder="Nick" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label"><b>Email</b></label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label"><b>Password</b></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label for="inputTel" class="col-sm-2 control-label"><b>Telephone</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputTel" placeholder="Telephone" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><b>Sex</b></label>
            <div class="col-sm-8">
            <div class="radio-inline">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsMale" value="Male" >
                    Male
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsFemale" value="Female">
                    Female
                </label>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCity" class="col-sm-2 control-label"><b>City</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputCity" placeholder="City" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label for="inputSite" class="col-sm-2 control-label"><b>Site</b></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputSite" placeholder="Site" style="width: 60%">
            </div>
        </div>

        <div class="form-group">
            <label for="inputInfo" class="col-sm-2 control-label"><b>Info</b></label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="3" id="inputInfo" placeholder="Info" style="resize: vertical; width: 58%"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="role" id="role">
                <button type="submit" class="btn btn-default registration">Registration</button>
            </div>
        </div>

    </form>
</div>

<script>
    $(document).on('click', '.roleChoice', function (e) {
        var allElem = document.getElementsByClassName('roleChoice');
        for (var i=0; i<allElem.length; i++) allElem[i].className = 'roleChoice';
        $(this).addClass('active');
        document.getElementById('mainForm').style.display = '';
        document.getElementById('role').value = $(this).prop('title');
    });
    $(document).on('click', '.registration', function (e) {
        var check = 0;
    });
</script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<?php echo $form->textFieldRow($model,'nick'); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'Login',
    )); ?>
</div>

<?php $this->endWidget(); ?>