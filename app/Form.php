<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Form;

class Form extends Model
{
    public $table = "free_trial_user";
    public $timestamps = false;
}