<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Order $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'order_delivery_address')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'customer_id')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'order_total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
