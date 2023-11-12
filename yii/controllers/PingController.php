<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Health check controller
 */
final class PingController extends Controller
{
    public function actionIndex(): Response
    {
        $request = Yii::$app->getRequest();
        $formatter = Yii::$app->getFormatter();

        return $this->asJson([
            'status' => 'pong',
            'server' => [
                'time' => $formatter->asDatetime(time()),
            ],
            'user' => [
                'ip' => $request->getUserIP(),
                'agent' => $request->getUserAgent(),
            ],
        ]);
    }
}
