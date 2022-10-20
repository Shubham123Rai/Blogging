<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogCategoryModel extends Model
{
    public function getBlogComment($id)
    {
        $builder = $this->db->table('comments');
        $builder->select("name,comment,created_at");
        $builder->where('post_id',$id);
        $builder->where('status','active');
        $result = $builder->get('comments');
        
        if (count($result->getResultArray())>1) 
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
}