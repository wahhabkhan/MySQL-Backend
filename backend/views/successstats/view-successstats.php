<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Success Stats List';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="successstats-view ms-5">
        <h4 class="text-center text-success" style="margin-left:95px"><?= Html::encode($this->title) ?></h4>
        <?= Html::a('Add Success Stat', ['add-successstats'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 200px; background:#CCCCCC; margin-bottom: 10px;']) ?>
        <table style="margin-left:195px" class="table table-bordered w-75">
            <tr>
                <th>ID</th>
                <th>Stat name</th>
                <th>Stat Number</th>
                <th>Action</th>
            </tr>
            <?php foreach ($models as $model): ?>
            <tr>
                <td><?= $model->id ?></td>
                <td><?= $model->statName ?></td>
                <td><?= $model->statNumber ?></td>
                <td>
                    <div class="btn-group" role="group">
                        <?= Html::a('View', ['view-successstats-details', 'id' => $model->id], ['class' => 'btn  rounded btn-success ms-1']) ?>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn rounded btn-success ms-1']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
