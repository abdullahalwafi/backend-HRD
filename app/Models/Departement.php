<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $table = 'departement';
    protected $guarded = ['id'];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
