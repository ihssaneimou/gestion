<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseurs extends Model
{
    protected $fillable =[
        'nom',
        'adresse',
        'telephone',
        'email',
        'num_fiscal',
        'compt_bancaire',
        'remarque'
        
];
    use HasFactory;
}
