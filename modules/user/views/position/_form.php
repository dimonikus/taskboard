<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-<?= $model->isNewRecord ? 'success' : 'primary' ?>">

    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="box-body">

        <?= $form->field($model, 'department_id')
            ->dropDownList(\app\modules\user\models\UserDepartment::getUserDepartmentList()) ?>

        <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
