<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Client Logos List';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="clientlogos-view ms-5">
        
        <h4 class="text-center text-success" style="margin-left:95px"><?= Html::encode($this->title) ?></h4>
            <?= Html::a('Add Client Logo', ['add-clientlogos'], ['class' => 'btn btn-success bg-success text-light', 'style' => 'margin-left: 295px; background:#CCCCCC; margin-bottom: 10px;']) ?>
        
        <table style="margin-left:295px" class="table table-bordered w-50 ">
            <tr>
                <th>ID</th>
                <th>Logo Name</th>
                <th>SVG Logo</th>
                <th>Action</th>
            </tr>
            <?php foreach ($models as $model): ?>
                <tr>
                    <td>
                        <?= $model->id ?>
                    </td>
                    <td>
                        <?= $model->logoName ?>
                    </td>

                    <td>
                        <?php
                        $adjustedSvg = str_replace('<svg ', '<svg width="230px" height="auto" ', $model->svgLogo);
                        echo $adjustedSvg;
                        ?>
                    </td>

                    <td>
                        <div class="btn-group" role="group">
                            <?= Html::a('View', ['view-clientlogos-details', 'id' => $model->id], ['class' => 'btn  rounded btn-success ms-1']) ?>
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