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
            <div class="c5-form">

            <?= Html::a('View C5', ['view-c5'], ['class' => 'btn btn-success bg-success text-light', 'style' => ' background:#CCCCCC; margin-bottom: 10px;']) ?>

                <h3 class="text-center text-success mb-4">Add C5</h3>

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'serialNumber')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'subHead')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'headCopy')->textInput(['maxlength' => true]) ?>
                
                <?=$form->field($model, 'detail')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'basic'
                ])?>

                <?= $form->field($model, 'svgLogoFile')->fileInput() ?>
                

                <div class="form-group text-center">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success w-25 my-4']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</body>



</html>