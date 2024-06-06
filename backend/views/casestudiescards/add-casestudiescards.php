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
            <div class="casestuidescard-form">

            <?= Html::a('View Case Studies', ['view-casestudiescards'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Case Study</h3>

                <?php $form = ActiveForm::begin();?>

                <?=$form->field($model, 'case_study_name')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'client_logo_file_name')->textInput()?>

                <?=$form->field($model, 'client_name')->textInput(['maxlength' => true])?>

                <!-- Replace textArea with CKEditor -->
                <?=$form->field($model, 'description')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic' // You can change this preset if needed
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
