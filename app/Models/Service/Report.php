<?php

namespace App\Models\Service;

use App\Models\Master\ReportCategories;
use App\Models\Resident\User;
use App\Models\User\UserProfile;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'image',
        'replied_at',
        'reply',
        'accepted_at',
        'acc_reply',
        'rejected_at',
        'rejected_reply',
        'report_category',
        'code',
        'status'
    ];

    protected $casts = [
        'rejected_at' => 'datetime',
        'replied_at' =>'datetime',
        'accepted_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user_profile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function reportCategories() {
        return $this->belongsTo(ReportCategories::class,'report_category');
    }
}
