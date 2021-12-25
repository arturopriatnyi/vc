<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'company_name', 'description', 'salary_min', 'salary_max'
    ];
}
