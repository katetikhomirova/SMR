<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\OrderDetailSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_price') ?>

    <?= $form->field($model, 'order_quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
