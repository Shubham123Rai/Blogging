<?php

namespace App\Models;
use \CodeIgniter\Model;

class LoginModel extends Model
{
    public function verifyEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select("uniid,status,name,password");
        $builder->where('email',$email);
        $result = $builder->get();

        if (count($result->getResultArray())==1) 
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }

    public function updatedAt($id)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid',$id);
        $builder->update(['updated_at'=>date('y-m-d h:i:s')]);

        if ($this->db->affectedRows()==1) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function verifyToken($token)
    {
        $builder = $this->db->table('users');
        $builder->select("uniid,name,updated_at");
        $builder->where('uniid',$token);
        $result = $builder->get();

        if(count($result->getResultArray()))
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }

    public function updatePassword($id,$pwd)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid',$id);
        $builder->update(['password'=>$pwd]);

        if ($this->db->affectedRows()==1) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}