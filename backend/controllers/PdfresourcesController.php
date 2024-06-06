<?php

namespace backend\controllers;

use common\models\Pdfresources;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class PdfresourcesController extends Controller
 {
    public function actionViewPdfresources()
 {
    if ( Yii::$app->user->can( '/pdfresources/view' ) ) {
        // Fetch all Pdfresources
        $models = Pdfresources::find()->all();

        return $this->render( 'view-pdfresources', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewPdfresourcesDetails( $id )
 {
        // Fetch the contact record to ensure it exists
        $model = Pdfresources::findOne( $id );

        return $this->render( 'view-pdfresources-details', [
            'model' => $model,
        ] );
    }

    public function actionAddPdfresources()
 {
        if ( Yii::$app->user->can( '/pdfresources/add' ) ) {
            $model = new Pdfresources();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-pdfresources', 'id' => $model->id ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-pdfresources', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $id )
 {
        if ( Yii::$app->user->can( '/pdfresources/update' ) ) {
            $model = $this->findModel( $id );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-pdfresources', 'id' => $model->id ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('/pdfresources/delete')) {
            // Delete the Pdfresources record directly
            $this->findModel($id)->delete();
            return $this->redirect(['view-pdfresources']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $id )
 {
        if ( ( $model = Pdfresources::findOne( [ 'id' => $id ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
