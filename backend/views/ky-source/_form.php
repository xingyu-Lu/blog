<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$item = \backend\models\KySource::type();

/* @var $this yii\web\View */
/* @var $model backend\models\KySource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ky-source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chapter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList($item    ) ?>

    <?= $form->field($model, 'source_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
