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
            <div class="pdfresources-form">

            <?= Html::a('View Pdf Resources', ['view-pdfresources'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Pdf Resource</h3>

                <?php $form = ActiveForm::begin();?>

                <?=$form->field($model, 'id')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'category')->textInput()?>

                <?=$form->field($model, 'title')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'detail')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ])?>

                <?=$form->field($model, 'filePath')->textInput(['maxlength' => true])?>  

                <div class="form-group text-center">
                    <?=Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4'])?>
                </div>

                <?php ActiveForm::end();?>

            </div>
        </div>
    </div>

</body>

</html>
