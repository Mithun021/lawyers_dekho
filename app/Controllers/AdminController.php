<?php

namespace App\Controllers;

use App\Models\Pages_model;
use App\Models\UsersModel;

class AdminController extends BaseController
{
    public function adminLogin(){
        $admin_model = new UsersModel();
        if ($this->request->is("get")) {

            // Check Session Status

            if (isset($_SESSION['adminLoginned'])) {
                $data = [
                    'title' => 'Home'
                ];
                return view("admin/home",$data); 
            }


            return view('admin/login');
        }
        else if ($this->request->is("post")) {
            $userId = $this->request->getPost('userId');
            $userPassword = $this->request->getVar('userPassword');

            $data = $admin_model->where('email',$userId)
                                ->orWhere('phoneNumber',$userId)->first();
            if($data){
                $session_data = [
                    'loggeduserFirstName' => $data['firstName'],
                    'loggeduserPhone' => $data['phoneNumber'],
                    'loggeduseremail' => $data['email'],
                    'loggeduserId' => $data['userId']
                ];
                $userPhone = $data['phoneNumber'];
                if (password_verify($userPassword, $data['password'])) {
                    $this->session->set('loggedUserData',$session_data);
                    $this->session->set('adminLoginned',"adminLoginned");
                    echo "dataMatch";
                } else {
                echo 'User ID or Password Mismatch';
                }
            }
            else{
                echo "Given Username or Phone Number not found";
            }
        }
       
    }
    public function adminDashboard(){
        $data = [
            'title' => 'Home'
        ];
        return view('admin/home',$data);
    }

    public function userLogout(){
        $this->session->destroy();
        return view('admin/login');
        
    }

    public function create_page(){
        $pages_model = new Pages_model();
        $data = [
            'title' => 'Create Page'
        ];
        if ($this->request->is("get")) {
            $data['pages'] = $pages_model->get();
            return view('admin/create_page',$data);
        }if ($this->request->is("post")) {
            $data = [
                'page_name' => $this->request->getPost('page_name'),
                'slug' => url_title(strtolower($this->request->getPost('page_name')))
            ];
            echo "<pre>"; print_r($data);
        }
    }


}
