<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Field Services List';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="fieldservice-view ms-5">
        <h4 class="text-center text-success" style="margin-left:95px"><?= Html::encode($this->title) ?></h4>
        <?= Html::a('Add Field Service', ['add-fieldservice'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 150px; background:#CCCCCC; margin-bottom: 10px;']) ?>
        <table style="margin-left:150px" class="table table-bordered w-75">
            <tr>
                <th>Serial Number</th>
                <th>Sub Head</th>
                <th>Head Copy</th>
                <th>Action</th>
            </tr>
            <?php foreach ($models as $model): ?>
            <tr>
                <td><?= $model->serialNumber ?></td>
                <td><?= $model->subHead ?></td>
                <td><?= $model->headCopy ?></td>
                <td>
                    <div class="btn-group" role="group">
                        <?= Html::a('View', ['view-fieldservice-details', 'serialNumber' => $model->serialNumber], ['class' => 'btn  rounded btn-success ms-1']) ?>
                        <?= Html::a('Update', ['update', 'serialNumber' => $model->serialNumber], ['class' => 'btn rounded btn-success ms-1']) ?>
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
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
