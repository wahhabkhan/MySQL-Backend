<?php

namespace backend\controllers;

use common\models\Csfilter;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class CsfilterController extends Controller
 {
    public function actionViewCsfilter()
 {
    if ( Yii::$app->user->can( '/csfilter/view' ) ) {
        // Fetch all Csfilter
        $models = Csfilter::find()->all();

        return $this->render( 'view-csfilter', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCsfilterDetails( $id )
 {
        // Fetch the contact record to ensure it exists
        $model = Csfilter::findOne( $id );

        return $this->render( 'view-csfilter-details', [
            'model' => $model,
        ] );
    }

    public function actionAddCsfilter()
 {
        if ( Yii::$app->user->can( '/csfilter/add' ) ) {
            $model = new Csfilter();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-csfilter', 'id' => $model->id ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-csfilter', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $id )
 {
        if ( Yii::$app->user->can( '/csfilter/update' ) ) {
            $model = $this->findModel( $id );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-csfilter', 'id' => $model->id ] );
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
        if (Yii::$app->user->can('/csfilter/delete')) {
            // Delete the Csfilter record directly
            $this->findModel($id)->delete();
            return $this->redirect(['view-csfilter']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $id )
 {
        if ( ( $model = Csfilter::findOne( [ 'id' => $id ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
