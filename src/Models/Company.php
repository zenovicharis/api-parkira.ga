<?php

namespace Parkiraga\Models;

use ActiveRecord\Model;

class Company extends Model
{
    static $table_name = 'companies';
    static $belongs_to = [
        ['users', 'foreign_key' => 'ceo', 'class_name' => 'User']
    ];

    public function serialize(){
        return $this->to_array([
            'include' =>
                [ 'users'
                ]
        ]);
    }
}