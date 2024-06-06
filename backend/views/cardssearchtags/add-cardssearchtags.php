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
            <div class="cardssearchtags-form">

            <?= Html::a('View Regions', ['view-cardssearchtags'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Case Study Region</h3>

                <?php $form = ActiveForm::begin();?>

                <?=$form->field($model, 'tag_name')->textInput(['maxlength' => true])?>

                <div class="form-group text-center">
                    <?=Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4'])?>
                </div>

                <?php ActiveForm::end();?>

            </div>
        </div>
    </div>

</body>

</html>
