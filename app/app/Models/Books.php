<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'favorite',
    ];

    public static function addBook($dados){
        return DB::insert('insert into books (title, description, url) values (?, ?, ?)', [$dados->title, $dados->description, $dados->url]);
    }

    public static function favoriteBook($dados){
        Books::where('id', $dados->id)->update(['favorite' => $dados->status]);
    }

    
}
