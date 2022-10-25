<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BlogModel;
use App\Models\RegisterModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;
use App\Models\ReplyModel;
use CodeIgniter\HTTP\Message;
use App\Libraries\Hash;
use App\Models\RatingModel;

class BlogController extends BaseController
{

    public $session;
    public $email;
    public $userModel;
    public $registerModel;

    public function __construct()
    {
        helper(['url', 'form', 'date', 'Form']);
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
        $this->userModel = new UserModel();
        $this->registerModel = new RegisterModel();
    }


    public function register2()
    {
        return view('frontend/register_outer');
    }

    public function save2()
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        ];

        $message = [
            "name" => [
                'required' => 'Your full name is required'
            ],
            "email" => [
                'required' => 'Email is required',
                'valid_email' => 'You must enter a valid email',
                'is_unique' => 'Email already taken'
            ],
            "Password" => [
                'required' => 'Password is required',
                'min_length' => 'Password must be atleast 5 character in length',
                'max_length' => 'Password must not have character more than 12 in length'
            ],
            "cpassword" => [
                'required' => 'Confirm Password is required',
                'min_length' => 'Password must be atleast 5 character in length',
                'max_length' => 'Password must not have character more than 12 in length',
                'matches' => 'Confirm Password must be same'
            ]
        ];

        if ($this->validate($rules, $message)) {
            $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'uniid' => $uniid,
                'activation_date' => date("Y-m-d h:i:s")
            ];
            if ($this->userModel->insert($data)) {
                $config['protocol'] = 'smtp';
                $config['mailPath'] = '/usr/sbin/sendmail';
                $config['charset']  = 'iso-8859-1';
                $config['wordWrap'] = true;
                $config['SMTPHost'] = 'smtp.gmail.com';
                $config['SMTPUser'] = 'knprai1999@gmail.com';
                $config['SMTPPass'] = 'qcwh fjfr dfoa blow';
                $config['SMTPPort'] = 587;
                $config['SMTPCrypto'] = 'tls';
                $config['mailType'] = 'html';

                $this->email->initialize($config);

                $to = $this->request->getVar('email');
                $subject = 'Account activation link - Algoworks';
                $mess = 'Hi ' . $this->request->getVar('name') . "<br><br>Thanks your account registered "
                    . "Successfully. <br>Please click the below link to activate your account<br><br>"
                    . "<a href='" . base_url() . "/register2/activate2/" . $uniid . "' target='_blank'>Activate Now</a><br><br>Thanks<br>AlogoWorks";

                $this->email->setTo($to);
                $this->email->setFrom('knprai1999@gmail.com', 'Algowork');
                $this->email->setSubject($subject);
                $filepath = 'public/assets/images/avatar.png';
                $this->email->attach($filepath);
                $this->email->setMessage($mess);

                if ($this->email->send()) {
                    $this->session->setTempdata('success', 'Account created successfully. Please activate your account', 3);
                    return redirect()->to('/login');
                } else {
                    $this->session->setTempdata('error', 'Account created successfully. Sorry Unable to send activation link', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setTempdata('error', 'Sorry unable to create an account, Try again', 3);
                return redirect()->to(current_url());
            }
        } else {

            return view('frontend/register_outer', [
                "validation" => $this->validator,
            ]);
            
        }
    }

    public function activate2($uniid = null)
    {
        $data = [];
        if (!empty($uniid)) {                                                                       //+1
            $userUniid = $this->userModel->select('activation_date,uniid,status')->where('uniid', $uniid)->first();
            if ($userUniid) {                                                                       //+2(incl. 1 for nesting)
                if ($this->verifyExpiryTime($userUniid['activation_date'])) {                       //+3(incl. 2 for nesting)
                    $check = $userUniid['status'];
                    if ($check == 'Inactive') {                                                     //+4(incl. 3 for nesting)     
                        $status = $this->registerModel->updatedStatus($uniid);
                        if ($status == true) {                                                      //+5(incl. 4 for nesting)
                            return redirect()->to('/check')->with('success', 'Account activated successfully');
                        }
                    } else {                                                                         //+1
                        $data['error'] = 'Your account is already activated';
                    }
                } else {                                                                             //+1
                    $data['error'] = 'Sorry! Activation link was expired';
                }
            } else {                                                                                //+1
                $data['error'] = 'Sorry! Unable to find your account';
            }
        } else {                                                                                    //+1
            $data['error'] = 'Sorry! Unable to process your request';
        }
        return view('frontend/register_outer', $data);
    }

    public function verifyExpiryTime($regTime = null)
    {
        $currTime = time();
        $registerTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$registerTime;

        if ($diffTime < 900) {
            $expression = "true";
        } else {
            $expression = "false";
        }
        return $expression;
    }

    public function blog_welcm()
    {
        return view('frontend/blog_theme');
    }

    public function navbar_choose_category()
    {
        $categoryModel = new CategoryModel();
        $ctg['val'] = $categoryModel->select('category')->findAll();
       
        return view('layout/navbar', $ctg);
    }

    public function categorywise_blog($category = null)
    {
        $blogModel = new BlogModel();
        $data = $blogModel->where(array(
            'category' => $category,
        ));
        $var['name'] = $data->get()->getResultArray();
        return view('frontend/show_category_wise_blog', $var);
    }

    public function categorywise_full_blog($id = null)
    {
        $blogModel = new BlogModel();
        $data = $blogModel->where(
            'id', $id,
        );
        
        $content['var'] = $data->get()->getResultArray();
       
        return view('frontend/full_blog_content', $content);
    }

    public function like($id)
    {
        
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $this->userModel->select('id')->find($loggedUserID);        

        $ratingModel = new RatingModel();
        $val = $ratingModel->select('blog_id,user_id,reaction')->where([
                    "blog_id"=>$id,
                    "user_id"=>$userInfo,
                ])->first();
        
       
        if ($val) 
        {
            
                $blogModel = new BlogModel();
                $count = $blogModel->select('like_count')->find($id);
                $var = [
                    'like_count' =>  $count['like_count']-1,
                ];
                $blogModel->update($id,$var);

                $ratingModel->where('blog_id',$id)->delete();
                return redirect()->back()->with('error', 'You disliked this post', 3);
  
        } 
        else 
        {
            $blogModel = new BlogModel();
                $count = $blogModel->select('like_count')->find($id);
                $var = [
                    'like_count' => $count['like_count']+1,
                ];

                $blogModel->update($id,$var);
                
            $data = [
                'blog_id' => $id,
                'user_id' => $userInfo,
                'reaction' => "like",
            ];

            $ratingModel->save($data);
            return redirect()->back()->with('success', 'Like added successfully', 3);        
        }
    }

    public function comment($id = null)
    {
        $blogModel = new BlogModel();
        $data = $blogModel->find($id);

        if (!empty($data)) 
        {

        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->select('id,name')->find($loggedUserID);

            $commentModel = new CommentModel();
            $value = [
                'post_id' => $id,
                'name'    =>$userInfo['name'],
                'comment' => $this->request->getPost('comment')

            ];

            $commentModel->save($value);
            return redirect()->back()->with('success', 'Comment added successfully');
        } else {

            return redirect()->back()->with('error', 'Sorry an error occured');
        }
    }

    public function showComment($id = null)
    {
        $commentModel = new CommentModel();

        $data['var'] = $commentModel->select("post_id,comment_id,name,comment,created_at,status")->where(
            "post_id", $id,
        )->find();

        return view('frontend/showComments', $data);
    }

    public function deleteComment($comment_id = null)
    {
        $commentModel = new CommentModel();

        $commentModel->where([
            "comment_id" => $comment_id,
        ])->delete();
        return redirect()->back()->with('error', 'Comment has been deleted successfully', 3);
    }

    public function showComment_outer($id = null)
    {

        $commentModel = new CommentModel();

        $data['var'] = $commentModel->select("comment_id,name,comment,created_at")->orderBy("post_id", "desc")->where([
            "post_id" => $id,
            'status'  => 'active',
        ])->findAll();

        return view('frontend/showComments_outer', $data);
    }

    public function view_reply_outer($id)
    {
        $replyModel = new ReplyModel();
        $data['var'] = $replyModel->select("comment_id,name,reply,created_at")->where(
            'comment_id',
            $id
        )->findAll();
        
        return view('frontend/showreply_outer', $data);
    }
}
