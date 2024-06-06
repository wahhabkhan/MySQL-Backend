<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Messages List';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .table-container {
            /* margin-left: 195px; */
            /* margin-top: 20px; */
        }

        #searchContainer {
            float: right;
            margin-right: 115px;
        }
        .searchQuery {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="messages-view ms-5">
        <h4 class="text-center text-success" style="margin-left: 95px"><?= Html::encode($this->title) ?></h4>

        <!-- Toggle Button for Auto-Sending Emails -->
        <div class="form-check form-switch" style="margin-left: 195px; margin-bottom: 10px;">
            <input class="form-check-input" type="checkbox" id="autoSendEmailsToggle">
            <label class="form-check-label" for="autoSendEmailsToggle">Auto-Send Emails</label>
        </div>

        <!-- Search form -->
        <div id="searchContainer">
        <form id="liveSearchForm"  class="">
            <input type="text" id="searchQuery" name="searchQuery" placeholder="Search...">
            <br><br>
        </form>
        </div>

        <!-- Container for displaying search results -->
        <div id="searchResultsContainer"></div>

        <div class="table-container">
        <table id="freedemoTable" class="table table-bordered w-75" style="margin-left: 195px">
            <tr>
                <th>Serial Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php foreach ($models as $model): ?>
                <?php if (!empty($model->name)): ?>
                    <tr>
                        <td><?= $model->serialNumber ?></td>
                        <td><?= $model->name ?></td>
                        <td><?= $model->email ?></td>
                        <td><?= $model->description ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <?= Html::a('View', ['view-freedemo-details', 'serialNumber' => $model->serialNumber], ['class' => 'btn rounded btn-success ms-1']) ?>
                                <?= Html::a('Delete', ['delete', 'serialNumber' => $model->serialNumber], [
                                    'class' => 'btn rounded btn-success ms-1',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Retrieve toggle state from localStorage on page load
            var autoSendEmailsEnabled = localStorage.getItem('autoSendEmailsEnabled');

            // Set initial toggle state based on stored value
            if (autoSendEmailsEnabled === 'true') {
                $('#autoSendEmailsToggle').prop('checked', true);
                sendEmailsAutomatically(); // Send emails automatically if toggle was previously enabled
            } else {
                $('#autoSendEmailsToggle').prop('checked', false);
            }

            // Handle toggle change event
            $('#autoSendEmailsToggle').change(function () {
                if ($(this).is(':checked')) {
                    // Toggle is ON, enable auto-send emails
                    localStorage.setItem('autoSendEmailsEnabled', 'true');
                    sendEmailsAutomatically();
                } else {
                    // Toggle is OFF, disable auto-send emails
                    localStorage.setItem('autoSendEmailsEnabled', 'false');
                }
            });

            function sendEmailsAutomatically() {
                var recipientEmail = 'mwahab.1611@gmail.com';
                $('table.w-75 tbody tr').each(function () {
                    var name = $(this).find('td:nth-child(2)').text();
                    var email = $(this).find('td:nth-child(3)').text();
                    var description = ''; // Set description value as needed

                    // Perform AJAX request to send email
                    $.ajax({
                        type: 'POST',
                        url: '<?= Yii::$app->urlManager->createUrl(['freedemo/send-email']) ?>',
                        data: {
                            recipientEmail: recipientEmail,
                            name: name,
                            description: description,
                            _csrf: '<?= Yii::$app->request->csrfToken ?>'
                        },
                        success: function (response) {
                            if (response.success) {
                                console.log('Email sent successfully to: ' + email);
                            } else {
                                console.error('Failed to send email to: ' + email);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error occurred while sending email to: ' + email + ' - ' + error);
                        }
                    });
                });
            }
        });



        $(document).ready(function () {
            $('#searchQuery').on('input', function () {
                var query = $(this).val().trim();

                $.ajax({
                    url: '<?= Yii::$app->urlManager->createUrl(['freedemo/live-search']) ?>',
                    method: 'get',
                    data: {
                        searchQuery: query
                    },
                    success: function (response) {
                        updateTable(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

        function updateTable(results) {
            var tbody = $('#freedemoTable tbody');
            tbody.empty(); // Clear existing table rows

            if (results.length > 0) {
                results.forEach(function (result) {
                    if (result.name) { // Check if email and description are not empty
                        var rowHtml = '<tr class="freedemoRow">';
                        rowHtml += '<td>' + result.serialNumber + '</td>';
                        rowHtml += '<td>' + result.email + '</td>';
                        rowHtml += '<td>' + result.description + '</td>';
                        rowHtml += '<td>' + '<div class="btn-group" role="group">' +
                            '<a href="view-freedemo-details?serialNumber=' + result.serialNumber + '" class="btn rounded btn-success ms-1">View</a>' +
                            '<a href="delete?serialNumber=' + result.serialNumber + '" class="btn rounded btn-success ms-1" data-confirm="Are you sure you want to delete this item?" data-method="post">Delete</a>' +
                            '</div>' + '</td>';
                        rowHtml += '</tr>';

                        tbody.append(rowHtml); // Append new row to the table body
                    }
                });
            } else {
                // No results found, display a message row
                tbody.html('<tr><td colspan="4">No results found</td></tr>');
            }
        }


    </script>



</body>

</html>