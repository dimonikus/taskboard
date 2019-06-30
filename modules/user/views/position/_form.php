<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_id')
        ->dropDownList(\app\modules\user\models\UserDepartment::getUserDepartmentList()) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
