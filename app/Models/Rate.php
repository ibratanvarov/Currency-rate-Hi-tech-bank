<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    use HasFactory;
    const Link = 'http://87.237.234.204:7456/back/v2/GetExchangeCourses/1';
    protected $fillable = ['sum','euro','dollar','ruble '];
    /**
     * @var float|int|mixed
     */
    private $total;

}
