<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\lengthAwarePaginator;
use DB;

class FileModel extends Model
{
    //
    protected $table = 'file';

    protected $fillable = [
    		'user_id',
    		'filename',
    		'filepath',
    		'size'
    ]; 
    
}
