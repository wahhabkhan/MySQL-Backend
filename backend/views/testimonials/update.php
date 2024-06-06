<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Testimonials $model */

$this->title = 'Update Testimonial: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Testimonial-update">

 <h4 class="text-success" style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    
    <?= $this->render('add-testimonials', [
        'model' => $model,
    ]) ?>

</div>