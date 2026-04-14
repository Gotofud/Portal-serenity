<?php

namespace App\Mail;

use App\Models\Service\Report;
use App\Enums\ReportStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $report;
    public $reply;
    public $status;

    public function __construct(Report $report, string $reply, ReportStatus $status)
    {
        $this->report = $report;
        $this->reply = $reply;
        $this->status = $status;
    }

    public function build()
    {
        $subject = match ($this->status) {
            ReportStatus::ACCEPTED => 'Laporan Anda Diterima',
            ReportStatus::FINISHED => 'Laporan Anda Selesai',
            ReportStatus::REJECTED => 'Laporan Anda Ditolak',
            default => 'Update Laporan Anda',
        };

        return $this->subject($subject)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('mails.report')
            ->with([
                'report' => $this->report,
                'reply' => $this->reply,
                'status' => $this->status,
            ]);
    }
}