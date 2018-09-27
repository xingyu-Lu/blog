<?php


namespace backend\controllers;


use backend\models\UserBackend;
use common\models\User;
use crazydb\ueditor\UEditor;
use yii\web\Controller;

class EditorController extends Controller
{
    public function init(){
        parent::init();
        //do something
        //这里可以对扩展的访问权限进行控制
    }

    public function actionConfig(){
        //do something
        //这里可以对 config 请求进行自定义响应
    }

    public function actionIndex()
    {
        $model = new UserBackend();
        return $this->render('index', [
            'model' => $model
        ]);
    }
}