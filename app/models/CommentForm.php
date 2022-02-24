<?php

namespace app\models;

use app\enums\Type_Comment;
use Yii;
use yii\base\Model;
use yii\helpers\Json;

class CommentForm extends Model
{
    // The comments property attribute in BaseAR should be encoded/decoded using this model

    public $comment;
    public $type;
    public $createdAt;
    public $createdBy; // user id
    public $commenter; // user full_name
    public $attribute;
    public $attributeLabel;
    public $oldValue;
    public $newValue;

    public function init()
    {
        $this->type =  Type_Comment::enums();
    }

    public function rules()
    {
        return [
            [['createdAt', 'createdBy', 'type', 'comment'], 'required'],
            [['attribute', 'attributeLabel', 'oldValue', 'newValue', 'commenter'], 'safe'],
            // [['comment'], 'string', 'skipOnEmpty' => false, 'max' => ''],
        ];
    }

    public function addNewEntry( $comments, $json_decode = false, $type = Type_Comment::Timestamp )
    {
        return $this->_prepareComments( $comments, $json_decode, $type );
    }

    public function save( &$model, $json_decode = false, $type = Type_Comment::Timestamp )
    {
        $model->comments = $this->_prepareComments( $model->comments, $json_decode, $type );
        return $model->save(); // false
    }

    private function _prepareComments( $comments, $json_decode, $type )
    {
        $this->createdAt = time();
        $this->createdBy = Yii::$app->user->id;
        $this->commenter = Yii::$app->user->identity->person->full_name;

        if ($this->validate())
        {
            $all_comments = $json_decode ? Json::decode($comments) : $comments;
            $all_comments[ uniqid() ] = [
                                'createdAt' => $this->createdAt,
                                'createdBy' => $this->createdBy,
                                'commenter' => $this->commenter,
                                'type' => $type,
                                'notes' => $this->comment
                            ];
            $comments = $all_comments;
        }
        return $comments;
    }
}
