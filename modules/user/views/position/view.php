<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserPosition */

$this->title = $model->position;
$this->params['breadcrumbs'][] = ['label' => 'User Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-position-view">
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
                'position',
                [
                    'attribute' => 'department_id',
                    'label' => 'Отдел',
                    'value' => function ($data) {
                        /* @var $data \app\modules\user\models\UserPosition */
                        /* @var $department \app\modules\user\models\UserDepartment */
                        $department = $data->getDepartment()->limit(1)->one();
                        return $department ? $department->department : null;
                    },
                ]
            ],
        ]) ?>

    </div>
</div>
