<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RegisterModel;
use App\Models\LoginModel;
use App\Libraries\Hash;


class Auth extends BaseController
{
    public $loginModel;
    public $registerModel;
    public $userModel;
    public $email;
    public $session;
    
    public function __construct()
    {
        helper(['url','form','date','Form']);
        $this->loginModel = new LoginModel();
        $this->userModel = new UserModel();
        $this->registerModel = new RegisterModel();
        $this->email=\Config\Services::email();
        $this->session=\Config\Services::session();
    }


    public function register()
    {        
        return view('auth/register');
        
    }

    public function save()
    {   
        $imageName=null;
        
        $rules = [
            'name'=>'required',
            'email'=>'required|valid_email|is_unique[users.email]',
            'password'=>'required|min_length[5]|max_length[12]',
            'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]'
        ];

        $message=[
            "name"=>[
                'required'=>'Your full name is required'
            ],
            "email"=>[
                'required'=>'Email is required',
                'valid_email'=>'You must enter a valid email',
                'is_unique'=>'Email already taken'
            ],
            "Password"=>[
                'required'=>'Password is required',
                'min_length'=>'Password must be atleast 5 character in length',
                'max_length'=>'Password must not have character more than 12 in length'
            ],
            "cpassword"=>[
                'required'=>'Confirm Password is required',
                'min_length'=>'Password must be atleast 5 character in length',
                'max_length'=>'Password must not have character more than 12 in length',
                'matches'=>'Confirm Password must be same'
            ]
            ];

        if ($this->validate($rules,$message)) 
        {
            $file = $this->request->getFile("file");
            if($file->isValid() && ! $file->hasMoved())
            {
            $imageName = $file->getRandomName();
            // $path = base_url().'uploads/'.$file->getName();
            $file->move("uploads/",$imageName);
            }
            
            $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $mymail = 'knprai1999@gmail.com';
            
            $data = [
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'profile_pic' => $imageName,
                'uniid' => $uniid,
                'activation_date'=>date("Y-m-d h:i:s")
            ];
            if($this->userModel->insert($data)) 
            { 
                $config['protocol'] = 'smtp';
                $config['mailPath'] = '/usr/sbin/sendmail';
                $config['charset']  = 'iso-8859-1';
                $config['wordWrap'] = true;
                $config['SMTPHost'] = 'smtp.gmail.com';
                $config['SMTPUser'] = $mymail;
                $config['SMTPPass'] = 'qcwh fjfr dfoa blow';
                $config['SMTPPort'] = 587;
                $config['SMTPCrypto'] = 'tls';
                $config['mailType'] = 'html';
    
                $this->email->initialize($config);
    
                $to = $this->request->getVar('email');
                $subject = 'Account activation link - Algoworks';
                $mess = 'Hi '.$this->request->getVar('name')."<br><br>Thanks your account registered "
                ."Successfully. <br>Please click the below link to activate your account<br><br>"
                ."<a href='".base_url()."/register/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks<br>AlogoWorks";
    
                $this->email->setTo($to);
                $this->email->setFrom($mymail, 'Algowork');
                $this->email->setSubject($subject);
                $filepath = 'public/assets/images/avatar.png';
                $this->email->attach($filepath);
                $this->email->setMessage($mess);

                if ($this->email->send()) 
                {
                    $this->session->set('success','Account created successfully. Please activate your account',3);
                    return redirect()->to('/login');
                }
                else
                {
                    $this->session->set('error','Account created successfully. Sorry Unable to send activation link',3);
                    return redirect()->to(current_url());
                }
            }
            else 
            {
                $this->session->set('error','Sorry unable to create an account, Try again',3);
                return redirect()->to(current_url());
            }
        }
        else
        {

            return view('auth/register', [
                "validation" => $this->validator,
            ]);
        
        }
    }

    public function activate($uniid=null)
    {
        $data=[];
        if (!empty($uniid))                                                                                     //+1
        {
            $userUniid = $this->userModel->select('activation_date,uniid,status')->where('uniid',$uniid)->first();
            if ($userUniid)                                                                                     //+2(incl. 1 for nesting)
            {
                if ($this->verifyExpiryTime($userUniid['activation_date']))                                     //+3(incl. 2 for nesting)
                {
                    $check = $userUniid['status'] ;
                    if ($check == 'Inactive')                                                                   //+4(incl. 3 for nesting)
                    {
                        $status = $this->registerModel->updatedStatus($uniid);
                        if ($status == true)                                                                    //+5(incl. 4 for nesting)
                        {
                            $data['success'] = 'Account activated successfully';
                        }
                    }
                    else                                                                                        //+1   
                    {
                        $data['error'] = 'Your account is already activated';
                    }
                }
                else                                                                                            //+1 
                {
                    $data['error'] = 'Sorry! Activation link was expired';
                }
            }
            else                                                                                                //+1 
            {
                $data['error'] = 'Sorry! Unable to find your account';
            }
        }
        else                                                                                                    //+1 
        {
            $data['error'] = 'Sorry! Unable to process your request';
        }
        return view('auth/register',$data);
    }

    public function verifyExpiryTime($regTime=null)
    {
        $currTime = time();
        $registerTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$registerTime;

        if ($diffTime < 900) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function login()
    {        
        return view('auth/login');
        
    }

    public function check()
    {

        // lets check validation for login 

        $rules=[
            "email"=>'required|valid_email',
            "password"=>'required|min_length[5]|max_length[12]',
        ];

        $message=[
            "emai"=> [
                'required'=>'Your Email is required',
                'valid_email'=>'Enter a valid email address',
                // 'is_unique'=>'The email is not register on our service'
            ],

            'password' => [
                'required'=>'Password required',
                'min_length'=>'Password must be atleast 5 character in length',
                'max_length'=>'Password must not have character more than 12 in length'
            ],
        ];
        
        if (!$this->validate($rules,$message))                                      //+1                                            //+1
        {
            return view('auth/login',['validation'=>$this->validator]);
        }
        else                                                                        //+1
        {
                $email= $this->request->getVar('email');
                $password= $this->request->getVar('password');
                $user = $this->userModel->where('email',$email)->first();
                
                if ($user)                                                          //+2(incl. 1 for nesting)
                {
                                        
                    if (password_verify($password, $user['password']))              //+3(incl. 2 for nesting)
                    {   
                        $usertype=$user['Role'];

                        if($usertype == '1')                                        //+4(incl. 3 for nesting)
                        {
                            
                            $user_id=$user['id'];
                            session()->set('loggedUser',$user_id);
                            return redirect()->to('/dash');
                            
                        }
                        else                                                        //+1
                        {
                            if($user['status']=='active')                           //+5(incl. 4 for nesting)
                            {
                            $user_id=$user['id'];
                            session()->set('loggedUser',$user_id);
                            return redirect()->to('/home');
                            }
                            else                                                    //+1
                            {
                                $this->session->set('block',"Your account has been blocked. Please contact admin");
                                return redirect()->to('/login');                                      
                            }
                        }
                        
                    }
                    else                                                            //+1
                    {
                       
                        $this->session->set('error','Sorry! You entered wrong password');
                        return redirect()->to(current_url());
                    }

                }else                                                               //+1
                {
                    
                    $this->session->set('error','Sorry! Email does not exist');
                    return redirect()->to(current_url());
                }
        }
        

    }

    public function logout()
    {    
        
        if (session()->has('loggedUser')) 
        {
            session()->remove('loggedUser');
            return redirect()->to('/login?access=out')->with('success','You are successfully logged out');
        }
    }

    public function deleteUser($id=null)
    {
        $this->userModel->delete($id);

        $data = [
            'status'=>"Deleted Successfully",
            'status_text'=>"Data has been deleted",
            'status_icon'=>"Success",
        ];
        
        return $this->response->setJSON($data);
        // return redirect()->to('/loggedInUser')->with('deleteMessage','Account has been deleted successfully');
             
    }

    public function UserDetails()
    {
        $data['var'] = $this->userModel->findAll();
        
        return view('auth/alldetails',$data);
    }

    public function forget_Password()
    {

        $data=[];

        if($this->request->getMethod()=="post")                         //+1
        {
            $rules=[
                "email"=>'required|valid_email',
            ];
    
            $message=[
                "emai"=> [
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email address',
                ],
            ];

            if ($this->validate($rules,$message))                           //+2 (incl. 1 for nesting)
            {
                $email= $this->request->getVar('email');
                $user = $this->loginModel->verifyEmail($email);

                $yourmail = 'knprai1999@gmail.com';

                if (!empty($user))                                          //+3 (incl.2 for nesting)
                {
                    if($this->loginModel->updatedAt($user['uniid']))        //+4 (incl. 3 for nesting)
                    {
                        $config['protocol'] = 'smtp';
                        $config['mailPath'] = '/usr/sbin/sendmail';
                        $config['charset']  = 'iso-8859-1';
                        $config['wordWrap'] = true;
                        $config['SMTPHost'] = 'smtp.gmail.com';
                        $config['SMTPUser'] = $yourmail;
                        $config['SMTPPass'] = 'qcwh fjfr dfoa blow';
                        $config['SMTPPort'] = 587;
                        $config['SMTPCrypto'] = 'tls';
                        $config['mailType'] = 'html';

                        $this->email->initialize($config);
                            
                        $to = $email;
                        $subject = 'Reset Password Link';
                        $token = $user['uniid'];
                        $message = 'Hi '.$user['name'].'<br><br>'
                                    .'Your reset password request has been received. Please click'
                                    .'the below link to reset your password.<br><br>'
                                    .'<a href="'.base_url().'/reset_password/'.$token.'">Click here to Reset Password </a>'
                                    .'<br><br>Thanks<br>AlogoWorks';
                        
                        $this->email->setTo($to);
                        $this->email->setFrom($yourmail, 'Algowork');
                        $this->email->setSubject($subject);
                        $this->email->setMessage($message);
                            
                        if ($this->email->send())                                       //+5 (incl. 4 for nesting)
                        {
                            $this->session->set('success','Reset password link sent to your register email id. Please verify within 15mins',3);
                            return redirect()->to(current_url());
                        } 
                        else                                                            //+1
                        {
                            $this->session->set('error','Reset password link has been expired.',3);
                            return redirect()->to(current_url());
                        }
                    }
                    else                                                                //+1
                    {
                        $this->session->set('error','Sorry! Unable to update. try again',3);
                        return redirect()->to(current_url());
                    }
                }
                else                                                                    //+1
                {
                    $this->session->set('error','Email id does not exists',3);
                    return redirect()->to(current_url());
                }

            }
            else                                                                        //+1
            {
                $data['validation']=$this->validator;

            }
        }
        return view("auth/forget_pass_view",$data);

    }


    public function reset_Password($token=null)
    {   
        $data=[];
        if (!empty($token))                                                         //+1
        {
            $userdata = $this->loginModel->verifyToken($token);
            if (!empty($userdata))                                                  //+2(incl. 1 for nesting)
            {
                if ($this->checkExpiryDate($userdata['updated_at']))                //+3(incl. 2 for nesting)
                {
                    if ($this->request->getMethod()=='post')                        //+4(incl. 3 for nesting)
                    {
                        $rules = [
                            'pwd'=>'required|min_length[6]|max_length[16]',
                            'cpwd'=>'required|matches[pwd]',
                        ];
                        $message =[ 
                        'cpwd'=>[
                            'required'=>'Password is required',
                            ],
                        'cpwd'=>[
                            'required'=>'Confirm Password is required',
                            ],
                        ];

                        if ($this->validate($rules,$message))                              //+5(incl.4 for nesting)
                        {
                            $pwd = Hash::make($this->request->getVar('pwd'));
                            
                            if ($this->loginModel->updatePassword($token,$pwd))             //+6(incl .5 for nesting)
                            {
                                $this->session->set('success','Password updated successfully');
                                return redirect()->to(base_url().'/login');
                            }
                            else                                                                //+1
                            {
                                $this->session->set('error','Sorry! Unable to update password ,Try again');
                                return redirect()->to(current_url());
                            }
                        }
                        else                                                                    //+1
                        {
                            return view('auth/reset_Password', [
                                "validation" => $this->validator,]);
                        }
                    }
                }
                else                                                                            //+1
                {
                    $data['error'] = "Reset password link was expired";
                }
            }
            else                                                                                //+1        
            {
                $data['error'] = "Unable to find user account";
            }    
        }
        else                                                                                    //+1    
        {
            $data['error'] = "Sorry! Unauthourized access";
        }
        return view('auth/reset_Password',$data);
    }


    public function checkExpiryDate($time=null)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $timeDiff = ($current_time - $update_time)/60;

        if ($timeDiff < 900) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
