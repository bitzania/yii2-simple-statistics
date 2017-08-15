<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel bitzania\statistic\models\LedgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ledgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ledger-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ledger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'account_id',
            'account_code',
            'trx_id',
            'trx_ref',
            // 'trx_date',
            // 'trx_value',
            // 'data:ntext',
            // 'balance_before',
            // 'balance_after',
            // 'created_on',
            // 'modified_on',
            // 'created_by',
            // 'modified_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
