<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Customer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'customer_password')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'custmer_email')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'customer_role')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
