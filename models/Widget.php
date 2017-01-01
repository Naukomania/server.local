<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "widget".
 *
 * @property integer $id
 * @property integer $node_id
 * @property integer $type
 * @property string $settings
 *
 * @property Node $node
 */
class Widget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'settings'], 'required'],
            [['node_id', 'type'], 'integer'],
            [['settings'], 'string'],
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
            'type' => 'Type',
            'settings' => 'Settings',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }
}
