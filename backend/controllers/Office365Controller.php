<?php

namespace backend\controllers;

use common\models\Office365;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class Office365Controller extends Controller
 {
    public function actionViewOffice365()
 {
    if ( Yii::$app->user->can( '/office365/view' ) ) {
        // Fetch all Office365
        $models = Office365::find()->all();

        return $this->render( 'view-office365', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewOffice365Details( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Office365::findOne( $serialNumber );

        return $this->render( 'view-office365-details', [
            'model' => $model,
        ] );
    }

    public function actionAddOffice365()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Office365/add-office365']);
        if ( Yii::$app->user->can( '/office365/add' ) ) {
            $model = new Office365();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-office365', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-office365', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/office365/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-office365', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/office365/delete')) {
            // Delete the Office365 record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-office365']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Office365::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
