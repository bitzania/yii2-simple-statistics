<?php

namespace bitzania\statistic;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\base\Object;


class SimpleStatistic extends Object {
    public function init()
    {
        Yii::trace("constructor simple statistic", 'bz');
    }
}
