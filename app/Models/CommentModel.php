<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comments';
    protected $primaryKey       = 'comment_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['comment_id','post_id','name','comment','status'];

    
}
