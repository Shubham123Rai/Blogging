<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;

class User extends BaseController
{
    public function user_index()
    {
        $userModel= new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);

        $user= [
            'titel'=>'User Dashboard',
            'data'=>$userInfo,

        ];
        return view('User/user_dash',$user);
    }


    public function user_edit($id=null)
    {
        $userModel= new UserModel();
        $userInfo['data']=$userModel->find($id);
        return view('User/user_update',$userInfo);
        
    }


    public function user_update($id=null)
    {
        $userModel = new UserModel();
            $userdata=[
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => Hash::make($this->request->getPost('password')),
            
            ];

        $userModel->update($id, $userdata);
        return redirect()->to(base_url('userdash'))->with('success','Student Data Updated Successfully');
    }

    public function user_profile()
    {
        $userModel= new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);

        $newuser= [
            'titel'=>'Profile',
            'data'=>$userInfo,

        ];
        return view('User/user_prof',$newuser);
    }
}