<?php

namespace App\Enums;

enum ReportStatus: string
{
    case PENDING = 'Pending';
    case ACCEPTED = 'Diterima';
    case FINISHED = 'Selesai';
    case REJECTED = 'Ditolak';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Menunggu',
            self::ACCEPTED => 'Diterima',
            self::FINISHED => 'Selesai',
            self::REJECTED => 'Ditolak',
        };
    }
}