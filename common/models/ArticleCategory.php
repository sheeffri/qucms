<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\ModelEvent;
use yii\db\BaseActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $parentId
 * @property integer $weight
 * @property integer $parentIdFk
 * @property bool $hasChild;
 *
 * @property ArticleCategory $parent
 * @property ArticleCategory[] $articleCategories
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    private $_hasChild = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['parentId', 'weight', 'parentIdFk'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['alias'], 'string', 'max' => 45],
            [['alias'], 'match', 'pattern' => '/^[a-z]*$/', 'message' => 'Синоним должен содержать только латинские символы в нижнем регистре.'],
            [['alias', 'parentId'], 'unique', 'targetAttribute' => ['alias', 'parentId'], 'message' => 'В этой группе уже присутсвует категория с таким синонимом.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'alias' => 'Синоним',
            'weight' => 'Порядок',
            'parent' => 'Родитель',
            'parent.name' => 'Родитель',
        ];
    }

    public function getHasChild()
    {
        if ($this->_hasChild === null) {
            if ($this->isNewRecord) {
                $this->_hasChild = false;
            } else {
                $this->_hasChild = (new Query())->from('article_category')->where(['parentId' => $this->id])->count() > 0;
            }
        }
        return $this->_hasChild;
    }

    public function beforeValidate()
    {
        if ($this->parentId == 0) {
            $this->parentIdFk = null;
        } else
            $this->parentIdFk = $this->parentId;
        return parent::beforeValidate();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'parentIdFk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['parentIdFk' => 'id']);
    }
}
