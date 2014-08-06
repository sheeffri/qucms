<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $categoryId
 * @property string $title
 * @property string $introText
 * @property string $text
 * @property string $tags
 * @property integer $authorId
 * @property string $createdAt
 * @property string $updaterAt
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $isPublished
 * @property integer $publishedAt
 * @property integer $publishedBy
 * @property integer $isDeleted
 * @property string $deletedAt
 * @property integer $deletedBy
 *
 * @property ArticleCategory $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId', 'title', 'authorId', 'createdAt', 'createdBy', 'updatedBy'], 'required'],
            [['categoryId', 'authorId', 'createdBy', 'updatedBy', 'isPublished', 'publishedAt', 'publishedBy', 'isDeleted', 'deletedBy'], 'integer'],
            [['introText', 'text'], 'string'],
            [['createdAt', 'updaterAt', 'deletedAt'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['tags'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryId' => 'Категория',
            'title' => 'Заголовок',
            'introText' => 'Вступительный текст',
            'text' => 'Текст',
            'tags' => 'Тэги',
            'authorId' => 'Автор',
            'createdAt' => 'Created At',
            'updaterAt' => 'Updater At',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'isPublished' => 'Is Published',
            'publishedAt' => 'Published At',
            'publishedBy' => 'Published By',
            'isDeleted' => 'Is Deleted',
            'deletedAt' => 'Deleted At',
            'deletedBy' => 'Deleted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'categoryId']);
    }
}
