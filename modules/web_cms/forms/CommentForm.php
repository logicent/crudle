<?php

namespace crudle\ext\web_cms\forms;

use crudle\app\crud\enums\Type_Comment;
use Yii;
use yii\helpers\Json;

class CommentForm extends yii\base\Model
{
    // The post_comments property attribute in ARModel should be encoded/decoded using this model
    public $_id; // unique id
    public $yourName;
    public $email;
    public $comment;
    public $createdAt;

    public function rules()
    {
        return [
            [['yourName', 'email', 'comment'], 'required'],
            [['createdAt', '_id'], 'safe'],
        ];
    }

    public function addNewEntry( $comments, $json_decode = false, $type = Type_Comment::Timestamp )
    {
        return $this->_prepareComments( $comments, $json_decode, $type );
    }

    public function save( &$model, $json_decode = false, $type = Type_Comment::Timestamp )
    {
        $model->post_comments = $this->_prepareComments( $model->post_comments, $json_decode, $type );
        return $model->save(); // false
    }

    private function _prepareComments( $comments, $json_decode, $type )
    {
        $this->createdAt = time();

        if ($this->validate())
        {
            $all_comments = $json_decode ? Json::decode($comments) : $comments;
            $all_comments[ uniqid() ] = [
                'createdBy' => $this->yourName,
                'email' => $this->email,
                'comment' => $this->comment,
                'createdAt' => $this->createdAt,
            ];
            $comments = $all_comments;
        }
        return $comments;
    }
}
