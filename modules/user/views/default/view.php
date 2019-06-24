<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Профиль пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->getFullName();
\yii\web\YiiAsset::register($this);
$attributes = [
    'id',
    'first_name',
    'last_name',
    'email',
    'date_entered',
    'date_modified',
];
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle" src="<?= $model->getAvatar() ?>"
                 alt="User profile picture">

            <h3 class="profile-username text-center"><?= $model->getFullName() ?></h3>

            <p class="text-muted text-center">Software Engineer <?= \Yii::getAlias('@uploads') ?></p>

            <ul class="list-group list-group-unbordered">
                <?php foreach ($attributes as $attribute): ?>
                    <li class="list-group-item">
                        <b><?= $model->attributeLabels()[$attribute] ?></b>
                        <div class="pull-right"><?= $model->$attribute ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="col-md-6">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-block btn-primary']) ?>
            </div>
            <div class="col-md-6">
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-block btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

        </div>
    </div>
</div>
<div class="col-md-3"></div>
