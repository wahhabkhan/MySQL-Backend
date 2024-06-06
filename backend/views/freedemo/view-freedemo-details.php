<?php

use yii\widgets\DetailView;
use yii\widgets\BreadCrumbs;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */

$this->title = 'Message';
$this->params['breadcrumbs'][] = ['label' => 'Messages List', 'url' => ['freedemo/view-freedemo'], 'class' => 'text-success'];
// $this->params['breadcrumbs'][] = $this->title;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

</head>

<body>

<div class="container" style="margin-left: 180px;">
    <div class="col-md-6">
        <div class="container-view">
            <div class="container">
                <h3 class="text-center text-success my-3"><?= Html::encode($this->title) ?> <?= Html::encode($model->serialNumber) ?>
                    <?="Details" ?>
                </h3>
                <?= Html::button('Forward', ['class' => 'btn btn-success', 'style' => 'margin-bottom:10px;', 'id' => 'forwardButton']) ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => 'breadcrumb'],
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'homeLink' => [
                        'label' => 'Home',
                        'url' => Yii::$app->homeUrl,
                        'class' => 'text-success',
                    ],
                ]) ?>
            </div>
            <div class="row ms-3">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'serialNumber',
                        'name',
                        'email',
                        'description',
   
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal for selecting email recipient -->
<div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Select Email Recipient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forwardForm">
                    <div class="form-group">
                        <label for="recipientEmail">Select Email Recipient:</label>
                        <!-- <select class="form-control" id="recipientEmail" name="recipientEmail">
                            <option value="mwahab.1611@gmail.com">HR</option>
                            <option value="zayn08237@gmail.com">Sales</option>
                           
                        </select> -->
                        <input type="email" class="form-control" id="recipientEmail" name="recipientEmail" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#forwardButton').click(function () {
            $('#forwardModal').modal('show');
        });

        $('#forwardForm').submit(function (e) {
            e.preventDefault();

            var recipientEmail = $('#recipientEmail').val();
            var name = '<?= Html::encode($model->name) ?>';
            var email = '<?= Html::encode($model->email) ?>';
            var description = '<?= Html::encode($model->description) ?>';

            // AJAX request to send the email
            $.ajax({
                url: '<?= Url::to(['freedemo/send-email']) ?>', 
                type: 'POST',
                data: {
                    'recipientEmail': recipientEmail,
                    'name': name,
                    'email': email,
                    'description': description,
                    '_csrf': '<?= Yii::$app->request->csrfToken ?>' // Include CSRF token for security
                },
                success: function(response) {
                    // Handle success - you can inform the user that the email was sent
                    alert('Email sent successfully to ' + recipientEmail);
                },
                error: function(xhr, status, error) {
                    // Handle error - you can inform the user that an error occurred
                    alert('An error occurred while sending the email.');
                }
            });

            // Close modal after attempting to send
            $('#forwardModal').modal('hide');
            
        });
        $('.close').on('click', function() {
    $('#forwardModal').modal('hide');
});

    });
</script>



</body>

</html>
