<?php

namespace backend\controllers;

use common\models\Customerservice;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class CustomerserviceController extends Controller
 {
    public function actionViewCustomerservice()
 {
    if ( Yii::$app->user->can( '/customerservice/view' ) ) {
        // Fetch all Customerservice
        $models = Customerservice::find()->all();

        return $this->render( 'view-customerservice', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCustomerserviceDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Customerservice::findOne( $serialNumber );

        return $this->render( 'view-customerservice-details', [
            'model' => $model,
        ] );
    }

    public function actionAddCustomerservice()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Customerservice/add-customerservice']);
        if ( Yii::$app->user->can( '/customerservice/add' ) ) {
            $model = new Customerservice();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-customerservice', 'serialNumber' => $model->serialNumber]);
                }
            }

            return $this->render( 'add-customerservice', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/customerservice/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-customerservice', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/customerservice/delete')) {
            // Delete the Customerservice record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-customerservice']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Customerservice::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
