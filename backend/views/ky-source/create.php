<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KySource */

$this->title = 'Create Ky Source';
$this->params['breadcrumbs'][] = ['label' => 'Ky Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ky-source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
