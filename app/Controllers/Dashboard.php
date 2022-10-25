<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\ReplyModel;
use App\Libraries\Hash;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel= new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);

        $data= [
            'titel'=>'Dashboard',
            'userInfo'=>$userInfo,

        ];
        return view('dashboard/index',$data);
    }

    public function profile()
    {
        $userModel= new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);

        $data= [
            'titel'=>'Profile',
            'userInfo'=>$userInfo,

        ];
        return view('dashboard/prof',$data);
    }

    public function edit($id=null)
    {
        $userModel= new UserModel();
        $userInfo=$userModel->find($id);

        $data = [
            'titel'=>'Profile',
            'userInfo'=>$userInfo,
        ];
        return view('dashboard/update',$data);
        
    }

    public function update($id=null)
    {
        $userModel = new UserModel();
        $user_pass= $userModel->find($id);
        $old_password = $user_pass['password'];

        $new_pass = $this->request->getPost('password');
        
        if(empty($new_pass))
        {        
            $data=[
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $old_password,
            'status' => $this->request->getPost('status'),
            ];
        }
        else
        {
            $data=[
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => Hash::make($new_pass),
                'status' => $this->request->getPost('status'),
    
                ];
            
        }

        $userModel->update($id, $data);
        return redirect()->to(base_url('dash'))->with('success',' Data Updated Successfully');
    }

    public function update_admin_image($id=null)
    {
        $imageName=null;

        $userModel = new UserModel();
        $userpic = $userModel->find($id);
        $old_image = $userpic['profile_pic'];

        $file = $this->request->getFile("file");
            if($file->isValid() && ! $file->hasMoved())
            {
            $imageName = $file->getRandomName();
            $file->move("uploads/",$imageName);
            }
            else
            {
                $imageName = $old_image;
            }

        $data=[
            'profile_pic' => $imageName,
        ];
        $userModel->update($id, $data);
        return redirect()->back()->with('success','Admin profile image updated successfully');
    }

    public function Block($id=null)
    {
        $userModel = new UserModel();
        $data = [
            'status'=>'Inactive'
        ];
        $userModel->update($id,$data);
        return redirect()->back()->with('success','Account has been blocked',3);
    }

    public function Unblock($id=null)
    {
        $userModel = new UserModel();
        $data = [
            'status'=>'active'
        ];
        $userModel->update($id,$data);
        return redirect()->back()->with('error','Account has been unblocked',3);
    }

    public function Blockcomment($comment_id=null)
    {

        $commentModel = new CommentModel();
        $data = [
            'status'=>'Inactive'
        ];
        $commentModel->update($comment_id,$data);
        
        return redirect()->to('/fetch_blog')->with('success','Comment has been blocked',3);
    }

    public function Unblockcomment($comment_id=null)
    {
        $commentModel = new CommentModel();
        $data = [
            'status'=>'active'
        ];
        $commentModel->update($comment_id,$data);
                                      

        return redirect()->to('/fetch_blog')->with('error','Comment has been unblocked',3);
    }

    public function create_blog()
    {
        $categoryModel = new CategoryModel();
        $ctg['val']=$categoryModel->findAll();
        
        return view('dashboard/create_blog',$ctg);
    }

    public function save_blog()
    {
        $imageName = null;
        $blogModel = new BlogModel();
            
            $file = $this->request->getFile("file");
            if($file->isValid() && ! $file->hasMoved())
            {
            $imageName = $file->getRandomName();
            // $path = base_url().'uploads/'.$file->getName();
            $file->move("uploads/",$imageName);
            }

            $data=[
            'category' => $this->request->getPost('category'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'file' => $imageName,
            ];

            $blogModel->save($data);
            return redirect()->to('/create_blog')->with('success','Data has been saved successfully');
            
    }

    public function home()
    {
        $categoryModel = new CategoryModel();
        $data['var'] = $categoryModel->findAll();
        return view('frontend/home_view',$data);
    }

    public function create_category()
    {
        return view('dashboard/create_category');
    }

    public function category_save()
    {
        $imageName = null;
        $categoryModel = new CategoryModel();

        $file = $this->request->getFile("file");
            if($file->isValid() && ! $file->hasMoved())
            {
            $imageName = $file->getRandomName();
            $file->move("uploads/",$imageName);
            }

        $data=[
            'category' => $this->request->getPost('category'),
            'text' => $this->request->getPost('description'),
            'pic' => $imageName,
        ];

        $categoryModel->save($data);
        return redirect()->to('/create_category')->with('success','Category created successfully');

    }

    public function delete_category($id=null)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);

        $data = [
            'status'=>"Deleted Successfully",
            'status_text'=>"Data has been deleted",
            'status_icon'=>"Success",
        ];
        
        return $this->response->setJSON($data);
        // return redirect()->back()->with('success','Category deleted successfully');
    }

    public function dash_category_view()
    {
        $categoryModel = new CategoryModel();
        $data['var'] = $categoryModel->findAll();
        return view('dashboard/view_category',$data);
    }

    public function dash_category_edit($id)
    {
        $categoryModel = new CategoryModel();
        $data['var'] = $categoryModel->find($id);

        return view('dashboard/category_update',$data);
    }

    public function dash_category_update($id)
    {
        $imageName = null;

        $categoryModel = new CategoryModel();
        $catgypic = $categoryModel->find($id);
        $old_image = $catgypic['pic'];

        $file = $this->request->getFile("file");
            if($file->isValid() && ! $file->hasMoved())
            {
            $imageName = $file->getRandomName();
            $file->move("uploads/",$imageName);
            }
            else
            {
                $imageName = $old_image;
            }

        $data = [
            'category' => $this->request->getPost('category'),
            'text' => $this->request->getPost('description'),
            'pic' => $imageName
        ];

        $categoryModel->update($id, $data);
        return redirect()->back()->with('success','Category data updated successfully');
    }

    public function fetch_blog_data()
    {
        $blogModel = new BlogModel(); 
        $data['var']=$blogModel->findAll();

        return view('dashboard/view_blog',$data);
        
    }

    public function blog_edit($id=null)
    {
        $blogModel = new BlogModel();
        $data['blogInfo']=$blogModel->find($id);
        return view('dashboard/blog_update',$data);
    }

    public function blog_update($id=null)
    {
        $imageName = null;

        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);
        $old_image = $blog['file'];

            $file = $this->request->getFile("file");
            if($file->isValid() && !$file->hasMoved())
            {
            $imageName = $file->getRandomName();
            $file->move("uploads/",$imageName);
            }
            else
            {
                $imageName = $old_image;
            }

            $data=[
            'category' => $this->request->getPost('category'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'file' => $imageName,
            ];

            

        $blogModel->update($id, $data);
    
        return redirect()->to(base_url('/fetch_blog'))->with('success','Blog Data Updated Successfully');
    }

    public function show_blog($id=null)
    {
        $blogModel = new BlogModel();
        $data['var']=$blogModel->find($id);
        
        return view('dashboard/blog_profile',$data);

    }

    public function blog_delete($id=null)
    {
        $blogModel = new BlogModel();
        $blogModel->delete($id);

        $data = [
            'status'=>"Deleted Successfully",
            'status_text'=>"Data has been deleted",
            'status_icon'=>"Success",
        ];
        
        return $this->response->setJSON($data);
    }

    public function reply_comment($id)
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->select('name')->find($loggedUserID);

        $value = [
            'comment_id' => $id,
            'name'  => $userInfo['name'],
            'reply' => $this->request->getPost('reply'),
        ];

        $replyModel = new ReplyModel();
        $commentModel = new CommentModel();
        $p_id = $commentModel->select('post_id')->where('comment_id',$id)->first();

        if($replyModel->save($value))
        {
            $userModel = new UserModel();
            $loggedUserID = session()->get('loggedUser');
            $userInfo = $userModel->find($loggedUserID); 

            if($userInfo['Role']== 1)
            {
                return redirect()->to('/showComment/'.$p_id['post_id'])->with('success', 'Reply added successfully');
            }
            else
            {
                return redirect()->to('/showComment_outer/'.$p_id['post_id'])->with('success', 'Reply added successfully');

            }
        }
        else
        {
            // return redirect()->to('/showComment/'.$p_id['post_id'])->with('error', 'Something went wrong');
        }
    }

    public function view_reply_comment($id)
    {
        $replyModel = new ReplyModel();
        $data['var'] = $replyModel->select("comment_id,reply_id,name,reply,created_at")->where(
            'comment_id', $id
        )->find();

        return view('dashboard/showreply', $data);
    }
}
