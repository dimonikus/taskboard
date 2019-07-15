<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Должность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-index">
    <div class="box">
        <div class="box-header">
            <p class="pull-right">
                <?= Html::a('Создать должность', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'position',
                    [
                        'attribute' => 'department_id',
                        'label' => 'Отдел',
                        'content' => function ($model, $key, $index, $column) {
                            /* @var $model \app\modules\user\models\UserPosition */
                            /* @var $department \app\modules\user\models\UserDepartment */
                            $department = $model->getDepartment()->limit(1)->one();
                            return $department ? $department->department : null;
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
