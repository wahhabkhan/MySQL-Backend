<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use dosamigos\ckeditor\CKEditor; // Import CKEditor

// Rest of your code

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div class="content">
        <div class="form-container">
            <div class="career-form">

                <?= Html::a('View Jobs', ['view-career'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Job</h3>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'jobTitle')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'experience')->textInput() ?>

                <?= $form->field($model, 'empLevel')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'validity')->widget(DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>

                <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'timings')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

                <!-- <div class="form-group">
                    <?= $form->field($model, 'jobFile')->fileInput(['id' => 'jobFile', 'class' => 'form-control col-sm-9']) ?>
                </div> -->


                <?= $form->field($model, 'jobDescription')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ]) ?>

                <?= $form->field($model, 'jobDuty')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ]) ?>

                <?= $form->field($model, 'jobDemands')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ]) ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</body>

</html>