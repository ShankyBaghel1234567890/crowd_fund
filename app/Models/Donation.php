<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function totalRaisedInMonth($month, $year)
    {
        return self::whereYear('created_at', $year)
                   ->whereMonth('created_at', $month)
                   ->sum('amount');
    }
}
