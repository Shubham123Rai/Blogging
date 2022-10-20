<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'blog';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category','title','description','file','like','dislike','like_count','dislike_count','user_id'];

   
}
