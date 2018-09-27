<?php

$this->title = 'ueditor';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= \crazydb\ueditor\UEditor::widget([
    'model' => $model,
    'attribute' => 'username',
    'config' => [
        //client config @see http://fex-team.github.io/ueditor/#start-config
        'serverUrl' => ['/ueditor/index'],//确保serverUrl正确指向后端地址
        'lang' => 'zh-cn',
        'iframeCssUrl' => Yii::getAlias('@web') . '/css/ueditor.css',// 自定义编辑器内显示效果
    ]
]) ?>
