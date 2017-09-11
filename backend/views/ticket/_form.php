<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>

<div class="site-signup">
    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'buser_id')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <label class="control-label" for="zyrjcard-buser_id">门票数量</label>
                <input type="text" id="zyrjcard-buser_id" class="form-control" name="ZyrjCard[count]" autofocus="">
            </div>

            <div class="form-group">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>