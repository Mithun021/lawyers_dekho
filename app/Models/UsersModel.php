<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class UsersModel extends Model
    {
        protected $table         = 'users';
        protected $primaryKey = 'userId';
        protected $allowedFields = [
            'firstName', 
            'lastName',
            'phoneNumber', 
            'city',
            'state', 
            'email',
            'password',
            'authority',
            'registed_date',
            'status',
            'web_contact',
            'web_email',
            'web_address',
            'web_logo',
            'facebook_link',
            'instagram_link',
            'twitter_link',
            'youtube_link',
        ];
        protected $createdField  = 'created_at';
        
    }
?>