<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\OrderDetail $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'product_id')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'product_price')->textInput() ?>

    <?= $form->field($model, 'order_quantity')->textInput(['maxlength' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
