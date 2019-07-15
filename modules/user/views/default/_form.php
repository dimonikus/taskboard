<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-<?= $model->isNewRecord ? 'success' : 'primary' ?>">

    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="box-body">

        <?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?php if ($model->isNewRecord): ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?php endif; ?>

        <?= $form->field($model, 'department')
            ->dropDownList(\app\modules\user\models\UserDepartment::getUserDepartmentList()) ?>

        <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'file')->fileInput()->label('Аватар') ?>

    </div>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-block btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
