<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = "customers";
}
