<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserPosition */

$this->title = 'Должность: ' . $model->position;
$this->params['breadcrumbs'][] = ['label' => 'User Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->position, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
