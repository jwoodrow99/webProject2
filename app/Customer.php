<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";

    protected $fillable = [
        "user_id",
        "name",
        "address",
        "city",
        "province",
        "postal",
        "phone"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
