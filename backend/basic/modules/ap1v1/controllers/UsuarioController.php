<?php

namespace app\modules\ap1v1\controllers;

use Prophecy\Doubler\Generator\Node\ClassNode;
use yii\web\Controller;
use yii\rest\ActiveController;

/**
 * Default controller for the `ap1v1` module
 */
class UsuarioController extends ActiveController
{
    public $modelClass = "app\models\Usuario";
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // remove authentication filter
        $auth = $behaviors['authenticator'];
        $contentNegotiator = $behaviors['contentNegotiator'];
        $verbs = $behaviors["verbFilter"];
        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];
        // re-add authentication filter
        $behaviors['verbFilter'] = $verbs;
        $behaviors['contentNegotiator'] = $contentNegotiator;
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        return $behaviors;
    }
}
