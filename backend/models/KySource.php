<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ky_source".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $type 1 数学，2英语 3 专业课 4 政治
 * @property string $source_link 资源链接
 * @property int $updated_time 更新时间
 * @property int $created_time 创建时间
 */
class KySource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ky_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'updated_time', 'created_time'], 'integer'],
            [['title', 'chapter'], 'string', 'max' => 250],
            [['source_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'chapter' => 'Chapter',
            'type' => 'Type',
            'source_link' => 'Source Link',
            'updated_time' => 'Updated Time',
            'created_time' => 'Created Time',
        ];
    }

    public static function type()
    {
        return [
            '1' => '数学',
            '2' => '英语',
            '3' => '专业课',
            '4' => '政治'
        ];
    }
}
