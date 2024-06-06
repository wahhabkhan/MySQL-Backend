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
            <div class="testimonial-form">

            <?= Html::a('View Testimonials', ['view-testimonials'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Testimonial</h3>

                <?php $form = ActiveForm::begin();?>

                <!-- <?=$form->field($model, 'id')->textInput(['maxlength' => true])?> -->

                <?=$form->field($model, 'name')->textInput()?>

                <?=$form->field($model, 'designation')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'company')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'details')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic' 
                ])?>

                <div class="form-group text-center">
                    <?=Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4'])?>
                </div>

                <?php ActiveForm::end();?>

            </div>
        </div>
    </div>

</body>

</html>
