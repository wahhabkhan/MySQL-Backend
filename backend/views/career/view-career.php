<?php

use yii\helpers\Html;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var array $models */


$this->title = 'Career List';
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
        <?= Html::a('Add Job', ['add-career'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 150px; background:#CCCCCC; margin-bottom: 10px;']) ?>
        <table style="margin-left:150px" class="table table-bordered w-75">
            <tr>
                <th>ID</th>
                <th>Job Title</th>
                <th>Experience</th>
                <th>Employment Level</th>
                <th>Validity</th>
                <!-- <th>Location</th> -->
                <!-- <th>Timings</th> -->
                <th>Salary</th>
                <!-- <th>File</th>  -->
                <!-- <th>Job Description</th>
                <th>Job Duty</th>
                <th>Job Demands</th> -->
                <th>Action</th>
            </tr>
            <?php foreach ($models as $model): ?>
            <tr>
                <td><?= $model->jobId ?></td>
                <td><?= $model->jobTitle ?></td>
                <td><?= $model->experience ?></td>
                <td><?= $model->empLevel ?></td>
                <td><?= $model->validity ?></td>
                <!-- <td><?= $model->location ?></td> -->
                <!-- <td><?= $model->timings ?></td> -->
                <td><?= $model->salary ?></td>
                <!-- <td>
        <?php if ($model->jobFile): ?>
            <?= Html::a('View File', Yii::getAlias('@web') . $model->jobFile, ['target' => '_blank']) ?>
            <?= Html::a('Download File', Yii::getAlias('@web') . $model->jobFile, ['class' => 'btn btn-success', 'style' => 'margin-left: 10px;', 'download' => true]) ?>
        <?php else: ?>
            No file uploaded
        <?php endif; ?>
    </td> -->

                <!-- <td><?= $model->jobDescription ?></td>
                <td><?= $model->jobDuty ?></td>
                <td><?= $model->jobDemands ?></td> -->
                <td>
                    <div class="btn-group" role="group">
                        <?= Html::a('View', ['view-career-details', 'jobId' => $model->jobId], ['class' => 'btn  rounded btn-success ms-1']) ?>
                        <?= Html::a('Update', ['update', 'jobId' => $model->jobId], ['class' => 'btn rounded btn-success ms-1']) ?>
                        <?= Html::a('Delete', ['delete', 'jobId' => $model->jobId], [
                            'class' => 'btn rounded btn-success ms-1',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
