<?php

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reply';
    protected $primaryKey       = 'reply_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['reply_id','comment_id','name','reply'];

    
}
