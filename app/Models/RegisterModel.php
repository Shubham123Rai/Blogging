<?php

namespace App\Models;
use \CodeIgniter\Model;

class RegisterModel extends Model
{
    public function verifyUniid($id)
    {
        $builder = $this->db->table('users');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid',$id);
        $result = $builder->get();
        
        if ($builder->countAll() == 1) 
        {
            return $result->getRow();
        }
        else
        {
            return false;
        }

    }

    public function updatedStatus($id)
    {
        $builder = $this->db->table('users');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid',$id);
        $builder->update(['status'=>'active']);

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