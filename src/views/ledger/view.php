<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bitzania\statistic\models\Ledger */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ledger-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'account_id',
            'account_code',
            'trx_id',
            'trx_ref',
            'trx_date',
            'trx_value',
            'data:ntext',
            'balance_before',
            'balance_after',
            'created_on',
            'modified_on',
            'created_by',
            'modified_by',
        ],
    ]) ?>

</div>
