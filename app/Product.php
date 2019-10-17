<?php

namespace App;

use App\Traits\OrderableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use OrderableTrait;
}
