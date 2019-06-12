<?php

use Caligrafy\Model;

class Project extends Model {
    
    public $id;
    public $title;
    public $category;
    public $short_description;
    public $description;
    public $image_url;
    public $user_id;
    public $created_at;
    public $modified_at;
    
    public function user()
    {
        return $this->hasOne('User', 'users');
    }
}


