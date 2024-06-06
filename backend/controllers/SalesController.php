<?php

namespace backend\controllers;

use common\models\Sales;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
class SalesController extends Controller
 {
    public function actionViewSales()
 {
    if ( Yii::$app->user->can( '/sales/view' ) ) {
        // Fetch all Sales
        $models = Sales::find()->all();

        return $this->render( 'view-sales', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewSalesDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Sales::findOne( $serialNumber );

        return $this->render( 'view-sales-details', [
            'model' => $model,
        ] );
    }

    public function actionAddSales()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Sales/add-sales']);
        if ( Yii::$app->user->can( '/sales/add' ) ) {
            $model = new Sales();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-sales', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-sales', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/sales/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-sales', 'serialNumber' => $model->serialNumber ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($serialNumber)
    {
        if (Yii::$app->user->can('/sales/delete')) {
            // Delete the Sales record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-sales']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Sales::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
