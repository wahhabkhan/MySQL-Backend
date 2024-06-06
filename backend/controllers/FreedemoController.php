<?php

namespace backend\controllers;

use common\models\Freedemo;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\helpers\Html;

class FreedemoController extends Controller
{
    // In your FreedemoController or appropriate controller

    public function actionSendEmail()
    {
        Yii::info('SendEmail action called', __METHOD__);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $recipientEmail = Yii::$app->request->post('recipientEmail');
        $name = Yii::$app->request->post('name');
        $senderEmail = Yii::$app->request->post('email');
        $description = Yii::$app->request->post('description');

        // Log the email addresses to verify them
        Yii::info("Recipient Email: {$recipientEmail}", __METHOD__);
        Yii::info("Sender Email: {$senderEmail}", __METHOD__);

        // Include the sender's email in the body
        $emailBody = "Email: " . $senderEmail . "\n\n" . "Description: " . $description;

        try {
            $result = Yii::$app->mailer->compose()
                ->setFrom($senderEmail)
                ->setTo($recipientEmail)
                ->setSubject('Message from ' . $name)
                ->setTextBody($emailBody) // Use the $emailBody variable here
                ->send();

            if ($result) {
                return ['status' => 'success', 'message' => 'Email sent successfully.'];
            } else {
                Yii::error('Email sending failed.');
                return ['status' => 'error', 'message' => 'Failed to send email.'];
            }
        } catch (\Exception $e) {
            Yii::error('Error sending email: ' . $e->getMessage(), __METHOD__);
            return ['status' => 'error', 'message' => 'An error occurred while sending the email.'];
        }
    }

    public function actionLiveSearch($searchQuery = null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($searchQuery !== null) {
            $models = Freedemo::find()
                ->where(['like', 'email', $searchQuery])
                ->orWhere(['like', 'description', $searchQuery])
                ->all();

            return $models;
        }

        return [];
    }

    public function actionViewFreedemo()
    {
        if ( Yii::$app->user->can( '/messages/view' ) ) {
        // Fetch all Freedemo
        $models = Freedemo::find()->all();

        return $this->render('view-freedemo', [
            'models' => $models,
        ]);
    } else {
        throw new ForbiddenHttpException;
    }
    }

    public function actionViewFreedemoDetails($serialNumber)
    {
        // Fetch the contact record to ensure it exists
        $model = Freedemo::findOne($serialNumber);

        return $this->render('view-freedemo-details', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($serialNumber)
    {
        if (Yii::$app->user->can('update')) {
            $model = $this->findModel($serialNumber);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-freedemo', 'serialNumber' => $model->serialNumber]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionDelete($serialNumber)
    {
        if (Yii::$app->user->can('delete')) {
            // Delete the Freedemo record directly
            $this->findModel($serialNumber)->delete();
            return $this->redirect(['view-freedemo']);
        } else {
            throw new ForbiddenHttpException;
        }
    }


    protected function findModel($serialNumber)
    {
        if (($model = Freedemo::findOne(['serialNumber' => $serialNumber])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
