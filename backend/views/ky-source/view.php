<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KySource */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ky Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ky-source-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'chapter',
            'title',
            [
                'label' => 'type',
                'format' => 'html',
                'value' => function($data) {
                    $item = \backend\models\KySource::type();
                    return $item[$data->type];
                }
            ],
            'source_link',
            'updated_time:datetime',
            'created_time:datetime',
        ],
    ]) ?>

</div>
