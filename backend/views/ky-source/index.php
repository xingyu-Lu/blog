<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KySourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ky Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ky-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ky Source', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'chapter',
            'title',
            'type',
            [
                'label' => 'type',
                'format' => 'html',
                'value' => function($data) {
                    $item = \backend\models\KySource::type();
                    return $item[$data->type];
                }
            ],
            [
                'label' => 'source_link',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href=$data->source_link>查看</a>";
                }
            ],
            //'updated_time:datetime',
            //'created_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
