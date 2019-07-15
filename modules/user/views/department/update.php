<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\UserDepartment */

$this->title = 'Отдел: ' . $model->department;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->department, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
