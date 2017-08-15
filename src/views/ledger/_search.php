<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bitzania\statistic\models\LedgerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ledger-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'account_id') ?>

    <?= $form->field($model, 'account_code') ?>

    <?= $form->field($model, 'trx_id') ?>

    <?= $form->field($model, 'trx_ref') ?>

    <?php // echo $form->field($model, 'trx_date') ?>

    <?php // echo $form->field($model, 'trx_value') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'balance_before') ?>

    <?php // echo $form->field($model, 'balance_after') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'modified_on') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
