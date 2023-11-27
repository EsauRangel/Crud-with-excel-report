<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "place_id",
        "expiration_date",
        "active",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        "expiration_date" => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    protected $appends = ["Titledate"];

    //Relations
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    //Scopes
    public function scopeActive($query)
    {
        return $query->where("active", 1);
    }

    public function scopeSearch($query, $serach)
    {
        if (!$query) {
            return $query;
        }

        return $query->where("title", "LIKE", "%$serach%");
    }

    //atributes
    public function getTitledateAttribute()
    {
        return $this->expiration_date . "-" . $this->title;
    }

}
