<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "case_study_tags".
 *
 * @property string $case_study_name
 * @property string $tag_name
 *
 * @property Casestudiescards $caseStudyName
 * @property Cardssearchtags $tagName
 */
class Casestudytags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'case_study_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['case_study_name', 'tag_name'], 'required'],
            [['case_study_name'], 'string', 'max' => 80],
            [['tag_name'], 'string', 'max' => 50],
            [['case_study_name', 'tag_name'], 'unique', 'targetAttribute' => ['case_study_name', 'tag_name']],
            [['case_study_name'], 'exist', 'skipOnError' => true, 'targetClass' => CaseStudiesCards::class, 'targetAttribute' => ['case_study_name' => 'case_study_name']],
            [['tag_name'], 'exist', 'skipOnError' => true, 'targetClass' => CardsSearchTags::class, 'targetAttribute' => ['tag_name' => 'tag_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'case_study_name' => 'Case Study Name',
            'tag_name' => 'Tag Name',
        ];
    }

    /**
     * Gets query for [[CaseStudyName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStudyName()
    {
        return $this->hasOne(Casestudiescards::class, ['case_study_name' => 'case_study_name']);
    }

    /**
     * Gets query for [[TagName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagName()
    {
        return $this->hasOne(cardssearchtags::class, ['tag_name' => 'tag_name']);
    }
}
