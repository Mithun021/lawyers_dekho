<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class UsersModel extends Model
    {
        protected $table         = 'users';
        protected $primaryKey = 'pages';
        protected $allowedFields = [
            'page_name', 
            'slug',
        ];
        protected $createdField  = 'created_at';
        
    }
?>