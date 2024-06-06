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
            <div class="clientlogos-form">
                <?= Html::a('View Clients Logos', ['view-clientlogos'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add Client Logo</h3>

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'logoName')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'svgLogoFile')->fileInput() ?>

                <!-- <?= $form->field($model, 'svgLogo')->textarea(['rows' => 30, 'style' => 'resize: vertical;']) ?> -->


                <div class="form-group text-center">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</body>

</html>
