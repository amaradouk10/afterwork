<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateurs extends Model implements Authenticatable
{
    use AuthAuthenticatable;
    use HasFactory;

}
