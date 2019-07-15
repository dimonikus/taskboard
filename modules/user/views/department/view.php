<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserDepartment */

$this->title = $model->department;
$this->params['breadcrumbs'][] = ['label' => 'User Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-department-view">
    <div class="box box-primary">
        <div class="box-header with-border">
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'department',
            ],
        ]) ?>

    </div>
</div>
