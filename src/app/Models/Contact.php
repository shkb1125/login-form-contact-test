<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    // public function ContactSearch($searchTerm)
    // {
    //     return $this->where('name', 'like', '%' . $search . '%')
    //         ->orWhere('email', 'like', '%' . $searchTerm . '%')
    //         ->get();
    // }

    // public function scopeKeywordSearch($query, $keyword)
    // {
    //     if (!empty($keyword)) {
    //         $query->where('content', 'like', '%' . $keyword . '%');
    //     }
    // }


    public function scopeKeywordSearch($query, $keyword, $gender, $category_id, $date)
    {
        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }


    // 内部結合
    // public function getCategoryContent()
    // {
    //     $categoryContent = DB::table('contacts')
    //         ->join('categories', 'contacts.category_id', '=', 'categories.id')
    //         ->get();
    //     return $categoryContent;
    // }
}



