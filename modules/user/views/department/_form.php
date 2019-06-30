<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\UserDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-<?= $model->isNewRecord ? 'success' : 'primary' ?>">

    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="box-body">

        <?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>

        <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-block btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
