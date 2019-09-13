<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLink extends Model
{
    protected $table = 'data_links';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
