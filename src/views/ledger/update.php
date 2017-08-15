<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bitzania\statistic\models\Ledger */

$this->title = 'Update Ledger: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ledger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
