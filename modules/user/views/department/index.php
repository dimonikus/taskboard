<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отдел';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">
    <div class="box">
        <div class="box-header">
            <p class="pull-right">
                <?= Html::a('Добавить отдел', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'department',
                    ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width: 100px']],
                ],
            ]); ?>
        </div>
    </div>

</div>
