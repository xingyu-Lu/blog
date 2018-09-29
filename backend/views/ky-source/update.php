<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KySource */

$this->title = 'Update Ky Source: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ky Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ky-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
