<?php

namespace backend\controllers;

use common\models\Bc;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class BcController extends Controller
 {
    public function actionViewBc()
 {
    if ( Yii::$app->user->can( '/bc/view' ) ) {
        // Fetch all Bc
        $models = Bc::find()->all();

        return $this->render( 'view-bc', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewBcDetails( $serialNumber )
 {
        // Fetch the contact record to ensure it exists
        $model = Bc::findOne( $serialNumber );

        return $this->render( 'view-bc-details', [
            'model' => $model,
        ] );
        
    }

    public function actionAddBc()
 {
        if ( Yii::$app->user->can( '/bc/add' ) ) {
            $model = new Bc();

            if ($model->load(Yii::$app->request->post())) {
                $model->svgLogoFile = UploadedFile::getInstance($model, 'svgLogoFile');
                if ($model->upload() && $model->save()) {
                    return $this->redirect(['view-bc', 'serialNumber' => $model->serialNumber]);
                }
            }

            return $this->render( 'add-bc', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $serialNumber )
 {
        if ( Yii::$app->user->can( '/bc/update' ) ) {
            $model = $this->findModel( $serialNumber );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-bc', 'serialNumber' => $model->serialNumber ] );
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
        if (Yii::$app->user->can('/bc/delete')) {
            // Delete the Bc record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-bc']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $serialNumber )
 {
        if ( ( $model = Bc::findOne( [ 'serialNumber' => $serialNumber ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
