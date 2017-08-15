<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bitzania\statistic\models\Ledger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ledger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account_id')->textInput() ?>

    <?= $form->field($model, 'account_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trx_id')->textInput() ?>

    <?= $form->field($model, 'trx_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trx_date')->textInput() ?>

    <?= $form->field($model, 'trx_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'balance_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balance_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'modified_on')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
