<?php

namespace backend\controllers;

use common\models\Casestudiescards;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class CasestudiescardsController extends Controller
 {
    public function actionViewCasestudiescards()
 {
    if ( Yii::$app->user->can( '/casestudy/view' ) ) {
        // Fetch all CaseStudiesCards
        $models = Casestudiescards::find()->all();

        return $this->render( 'view-casestudiescards', [
            'models' => $models,
        ] );
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewCasestudiescardsDetails( $case_study_name )
 {
        // Fetch the contact record to ensure it exists
        $model = Casestudiescards::findOne( $case_study_name );

        return $this->render( 'view-casestudiescards-details', [
            'model' => $model,
        ] );
    }

    public function actionAddCasestudiescards()
 {
        if ( Yii::$app->user->can( '/casestudy/add' ) ) {
            $model = new Casestudiescards();

            if ( $this->request->isPost ) {
                if ( $model->load( $this->request->post() ) && $model->save() ) {
                    return $this->redirect( [ 'view-casestudiescards', 'case_study_name' => $model->case_study_name ] );
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render( 'add-casestudiescards', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }

    }

    public function actionUpdate( $case_study_name )
 {
        if ( Yii::$app->user->can( '/casestudy/update' ) ) {
            $model = $this->findModel( $case_study_name );

            if ( $this->request->isPost && $model->load( $this->request->post() ) && $model->save() ) {
                return $this->redirect( [ 'view-casestudiescards', 'case_study_name' => $model->case_study_name ] );
            }

            return $this->render( 'update', [
                'model' => $model,
            ] );
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($case_study_name)
    {
        if (Yii::$app->user->can('/casestudy/delete')) {
            // Delete the career record directly
            $this->findModel($case_study_name)->delete();
            return $this->redirect(['view-casestudiescards']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    

    protected function findModel( $case_study_name )
 {
        if ( ( $model = Casestudiescards::findOne( [ 'case_study_name' => $case_study_name ] ) ) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
