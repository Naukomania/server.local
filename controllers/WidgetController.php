<?php

namespace app\controllers;

use yii\rest\ActiveController;

class WidgetController extends ActiveController
{
    // указываем класс модели, который будет использоваться
    public $modelClass = 'app\models\Widget';

    public function behaviors()
    {
        return 
        \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ]);
    }
}