<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="box">
        <div class="box-header">
            <p class="pull-right">
                <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'first_name',
            'last_name',
            'email:email',
            'department',
            'position',
            //'date_entered',
            //'date_modified',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width: 100px']],
        ],
    ]); ?>
        </div>
    </div>

</div>
