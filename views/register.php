<?php
/** @var $model \app\core\Model */

use app\core\form\Form;

$form = new Form();
?>

<h1>Register</h1>

<?php $form = Form::begin('', 'post') ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?> 
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password') ?>
    <?php echo $form->field($model, 'passwordConfirm') ?>
    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>