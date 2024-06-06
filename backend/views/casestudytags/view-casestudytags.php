<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Case Study Regions List';
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
        <?= Html::a('View Case Studies', ['casestudiescards/view-casestudiescards'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 300px; background:#CCCCCC; margin-bottom: 10px;']) ?>
        
        <table style="margin-left:295px" class="table table-bordered w-50">
            <tr>
                <th>Case Study Name</th>
                <th>Tag Name</th>
            </tr>
            <?php foreach ($models as $model): ?>
            <tr>
                <td><?= $model->case_study_name ?></td>
                <td><?= $model->tag_name?></td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- <?= Html::a('View', ['view-casestudytags-details', 'case_study_name' => $model->case_study_name], ['class' => 'btn  rounded btn-success ms-1']) ?> -->
                        <?= Html::a('Update', ['update', 'case_study_name' => $model->case_study_name], ['class' => 'btn rounded btn-success ms-1']) ?>
                        <?= Html::a('Delete', ['delete', 'case_study_name' => $model->case_study_name], [
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
