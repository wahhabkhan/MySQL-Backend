<?php

namespace backend\controllers;

use common\models\Testimonials;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class TestimonialsController extends Controller
 {
    public function actionViewTestimonials()
 {
    if ( Yii::$app->user->can( '/testimonials/view' ) ) {
        // Fetch all Testimonials
        $models = Testimonials::find()->all();

        return $this->render( 'view-testimonials', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewTestimonialsDetails( $id )
 {
        // Fetch the contact record to ensure it exists
        $model = Testimonials::findOne( $id );

        return $this->render( 'view-testimonials-details', [
            'model' => $model,
        ] );
    }

    public function actionAddTestimonials()
 {
        if ( Yii::$app->user->can( '/testimonials/add' ) ) {
            $model = new Testimonials();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-testimonials', 'id' => $model->id ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-testimonials', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $id )
 {
        if ( Yii::$app->user->can( '/testimonials/update' ) ) {
            $model = $this->findModel( $id );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-testimonials', 'id' => $model->id ] );
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
        if (Yii::$app->user->can('/testimonials/delete')) {
            // Delete the Testimonials record directly
            $this->findModel($id)->delete();
            return $this->redirect(['view-testimonials']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $id )
 {
        if ( ( $model = Testimonials::findOne( [ 'id' => $id ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
