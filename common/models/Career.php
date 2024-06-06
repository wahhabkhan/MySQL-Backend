<?php

namespace common\models;

use Yii;

class Career extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $start_date;
    public $end_date;
    public $jobFile; // Define the file upload attribute

    public static function tableName()
    {
        return 'career_jobs';
    }

    public function rules()
    {
        return [
            [['jobTitle', 'experience', 'empLevel', 'validity', 'location', 'timings', 'salary', 'jobDescription', 'jobDuty', 'jobDemands'], 'required'],
            [['experience'], 'integer'],
            [['validity'], 'date', 'format' => 'yyyy-mm-dd'],
            [['jobTitle', 'empLevel', 'location', 'timings', 'salary', 'jobDescription', 'jobDuty', 'jobDemands'], 'string', 'max' => 2000],
            [['jobFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx'], // Validate file type
        ];
    }

    public function attributeLabels()
    {
        return [
            'jobId' => 'Job ID',
            'jobTitle' => 'Job Title',
            'experience' => 'Experience',
            'empLevel' => 'Employment Level',
            'validity' => 'Validity',
            'location' => 'Location',
            'timings' => 'Timings',
            'salary' => 'Salary',
            'jobDescription' => 'Job Description',
            'jobDuty' => 'Job Duty (Note: Add two dots(full stop) at the end of line to separate or move to the next line in website)',
            'jobDemands' => 'Job Demands (Note: Add two dots(full stop) at the end of line to separate or move to the next line in website)',
            'jobFile' => 'Description/Requirements', // Label for file upload field
        ];
    }
}
