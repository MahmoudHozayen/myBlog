<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Posts extends Model
{
    protected $guarded = [];


	public function comments(){
    	return $this->hasMany(Comments::class);
    }

    
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters){
    	if (empty($filters)){
	     return $query;
	    }  
        if ($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
      
    }

    public static function archives(){
    	return static::selectRaw('year(created_at) AS Year, monthname(created_at) AS Month, count(*) AS Published ')
                        ->groupBy('Year', 'Month')
                        ->orderByRaw('min(created_at) DESC')
                        ->get()
                        ->toArray();
    }
}
