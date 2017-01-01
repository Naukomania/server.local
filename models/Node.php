<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property integer $id
 * @property integer $node_id
 * @property string $title
 *
 * @property Node $node
 * @property Node[] $nodes
 * @property Widget[] $widgets
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::className(), 'targetAttribute' => ['node_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'node_id' => 'Node ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Node::className(), ['node_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasMany(Widget::className(), ['node_id' => 'id']);
    }
}
