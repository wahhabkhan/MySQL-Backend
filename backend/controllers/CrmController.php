<?php

namespace backend\controllers;

use common\models\Crm;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;


class CrmController extends Controller
 {
    public function actionViewCrm()
 {
    if ( Yii::$app->user->can( '/crm/view' ) ) {
        // Fetch all Crm
        $models = Crm::find()->all();

        return $this->render( 'view-crm', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCrmDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Crm::findOne( $serialNumber );

        return $this->render( 'view-crm-details', [
            'model' => $model,
        ] );
    }

    public function actionAddCrm()
 {
        // Debugging route
       // echo \yii\helpers\Url::toRoute(['Crm/add-crm']);
        if ( Yii::$app->user->can( '/crm/add' ) ) {
            $model = new Crm();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-crm', 'serialNumber' => $model->serialNumber]);
                }
            }
            return $this->render( 'add-crm', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

            
        

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/crm/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-crm', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/crm/delete')) {
            // Delete the Crm record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-crm']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Crm::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
