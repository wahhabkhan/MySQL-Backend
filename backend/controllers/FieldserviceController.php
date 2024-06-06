<?php

namespace backend\controllers;

use common\models\Fieldservice;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class FieldserviceController extends Controller
 {
    public function actionViewFieldservice()
 {
    if ( Yii::$app->user->can( '/fieldservice/view' ) ) {
        // Fetch all Fieldservice
        $models = Fieldservice::find()->all();

        return $this->render( 'view-fieldservice', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewFieldserviceDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Fieldservice::findOne( $serialNumber );

        return $this->render( 'view-fieldservice-details', [
            'model' => $model,
        ] );
    }

    public function actionAddFieldservice()
 {
        if ( Yii::$app->user->can( '/fieldservice/add' ) ) {
            $model = new Fieldservice();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-fieldservice', 'serialNumber' => $model->serialNumber]);
                }
            }

            return $this->render( 'add-fieldservice', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/fieldservice/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-fieldservice', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/fieldservice/delete')) {
            // Delete the Fieldservice record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-fieldservice']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Fieldservice::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
