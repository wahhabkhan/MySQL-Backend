<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Case Studies List';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="career-view ms-5">
        <h4 class="text-center text-success" style="margin-left:95px"><?= Html::encode($this->title) ?></h4>
        <?= Html::a('Add Case Study', ['add-casestudiescards'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 200px; background:#CCCCCC; margin-bottom: 10px;']) ?>

        <table style="margin-left:195px" class="table table-bordered w-75">
            <tr>
                <th>Case Study Name</th>
                <!-- <th>Client Logo Filename</th> -->
                <th>Client Name</th>
                <!-- <th>Description</th> -->
            </tr>
            <?php foreach ($models as $model): ?>
            <tr>
                <td><?= $model->case_study_name ?></td>
                <!-- <td><?= $model->client_logo_file_name?></td> -->
                <td><?= $model->client_name ?></td>
                <!-- <td><?= $model->description ?></td> -->
                <td>
                    <div class="btn-group" role="group">
                        <?= Html::a('View', ['view-casestudiescards-details', 'case_study_name' => $model->case_study_name], ['class' => 'btn rounded btn-success ms-1']) ?>
                        <?= Html::a('Update', ['update', 'case_study_name' => $model->case_study_name], ['class' => 'btn rounded btn-success ms-1']) ?>
                        <?= Html::a('Delete', ['delete', 'case_study_name' => $model->case_study_name], [
                            'class' => 'btn rounded btn-success ms-1',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('Assign Regions', ['casestudytags/add-casestudytags', 'case_study_name' => $model->case_study_name], ['class' => 'btn  rounded btn-danger text-light ms-1']) ?>
                        <?= Html::a('View Regions', ['casestudytags/view-casestudytags', 'case_study_name' => $model->case_study_name], ['class' => 'btn  rounded btn-danger text-light ms-1']) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
