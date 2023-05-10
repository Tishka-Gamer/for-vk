<?php 

namespace App\models;

use App\helpers\Connection;

class Comment{
    
    public static function get($id){
        //получаем все отзывы у товара
        $query = Connection::make()->prepare("SELECT comments.*, users.name AS user FROM comments INNER JOIN users ON comments.user_id = users.id WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    } 
    public static function post($text, $user_id){
        //получаем все отзывы у товара
        $query = Connection::make()->prepare("INSERT INTO comments (text, user_id, date_create) VALUES (:text, :user_id, date_create)");
        $query->execute(["text" => $text, "user_id" => $user_id, "date_create"=>date('Y-m-d H:i:s')]);
        return $query->fetch();
        
    } 
    public static function put($id, $text){
        $query =  Connection::make()->prepare('UPDATE comments SET text = :text WHERE id = :id');
        $query->execute([
        'text' => $text,
        'id' => $id]);
    }
    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM comments WHERE id = :id");
        $query->execute(["id" => $id]);
    }
    public static function getR($id){
        //получаем все отзывы у товара
        $query = Connection::make()->prepare("SELECT commentsInPerent.*, users.name AS user, comments.text as perent FROM commentsInPerent INNER JOIN users ON commentsInPerent.user_id = users.id INNER JOIN comments ON commentsInPerent.comment_id = comments.id WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    } 
    public static function postR($text, $user_id, $comment_id){
        //получаем все отзывы у товара
        $query = Connection::make()->prepare("INSERT INTO commentsInPerent (text, user_id, date_create, comment_id) VALUES (:text, :user_id, date_create, :comment_id)");
        $query->execute(["text" => $text, "user_id" => $user_id, "date_create"=>date('Y-m-d H:i:s'), "comment_id"=> $comment_id]);
        return $query->fetch();
        
    } 
    public static function putR($id, $text){
        $query =  Connection::make()->prepare('UPDATE commentsInPerent SET text = :text WHERE id = :id');
        $query->execute([
        'text' => $text,
        'id' => $id]);
    }
    public static function deleteR($id)
    {
        $query = Connection::make()->prepare("DELETE FROM commentsInPerent WHERE id = :id");
        $query->execute(["id" => $id]);
    }
}
