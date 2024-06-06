<?php

use yii\widgets\DetailView;
use yii\widgets\BreadCrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\C5 */

$this->title = 'C5';
$this->params['breadcrumbs'][] = ['label' => 'C5 List', 'url' => ['c5/view-c5'], 'class' => 'text-success'];
// $this->params['breadcrumbs'][] = $this->title;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container" style="margin-left: 180px;">
    <div class="col-md-6">
        <div class="container-view">
            <div class="container">
                <h3 class="text-center text-success my-3"><?= Html::encode($this->title) ?> <?= Html::encode($model->serialNumber) ?>
                    <?="Details" ?>
                </h3>
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
            <div class="row">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'serialNumber',
                        'subHead',
                        'headCopy',
                        'detail',
                        [
                            'attribute' => 'svgIcon',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return '<object type="image/svg+xml" data="data:image/svg+xml;base64,' . base64_encode($model->svgIcon) . '" style="width: 130px; height: auto;"></object>';
                
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

</body>

</html>
