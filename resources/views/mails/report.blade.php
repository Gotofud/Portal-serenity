<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Update Laporan</title>
</head>

<body style="margin:0; padding:0; background-color:#f5f5f5; font-family: Arial, Helvetica, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px 0;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:6px; overflow:hidden;">

                    <!-- Header (SAMA PERSIS) -->
                    <tr>
                        <td style="padding:30px;">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width:80px; height:80px; text-align:center; vertical-align:middle;">
                                        <!-- SVG LOGO (tetap) -->
                                        {!! file_get_contents(public_path('assets/img/text-icon.svg')) !!}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:0 30px 40px 30px; color:#111111;">

                            <!-- Sapaan -->
                            <p style="font-size:20px; font-weight:400; margin:0 0 16px 0;">
                                Halo {{ $report->users->name ?? $report->users->name }},
                            </p>

                            <!-- Status -->
                            <p style="font-size:14px; line-height:1.6; color:#555555; margin:0 0 20px 0;">
                                @if($status === \App\Enums\ReportStatus::ACCEPTED)
                                    Laporan Anda telah kami <strong style="color:blue;">terima</strong> dan sedang diproses.
                                @elseif($status === \App\Enums\ReportStatus::FINISHED)
                                    Laporan Anda telah <strong style="color:green;">diselesaikan</strong>.
                                @elseif($status === \App\Enums\ReportStatus::REJECTED)
                                    Mohon maaf, laporan Anda <strong style="color:red;">ditolak</strong>.
                                @else
                                    Berikut adalah update laporan Anda.
                                @endif
                            </p>

                            <!-- Detail -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                                <tr>
                                    <td width="120"><strong>Nama</strong></td>
                                    <td>: {{ $report->users->user_profile->full_name ?? $report->users->name }}</td>
                                </tr>
                                <tr>
                                    <td width="120"><strong>Subjek</strong></td>
                                    <td>: {{ $report->subject ?? 'Subjek' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tipe</strong></td>
                                    <td>: {{ $report->reportCategories->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal</strong></td>
                                    <td>: {{ $report->created_at }}</td>
                                </tr>
                            </table>

                            <!-- Deskripsi -->
                            <p style="font-size:13px; line-height:1.7; color:#11111; opacity:50%; margin-bottom:20px;">
                                {!! nl2br(e($report->description ?? '-')) !!}
                            </p>

                            <!-- Reply -->
                            @if(!empty($reply))
                                <p style="font-size:14px; font-weight:bold; margin-bottom:8px;">
                                    Tanggapan:
                                </p>

                                <p style="font-size:14px; line-height:1.7; opacity:50%; color:#111111; margin:0 0 28px 0;">
                                    {!! nl2br(e($reply)) !!}
                                </p>
                            @endif

                            <!-- Closing -->
                            <p style="font-size:14px; line-height:1.6; color:#555555; margin:0 0 24px 0;">
                                Jika masih ada pertanyaan atau laporan lain,
                                silakan hubungi kami kembali.
                            </p>

                            <p style="font-size:14px; color:#111111; margin:0;">
                                Salam,<br>
                                <strong>{{ config('app.name') }}</strong><br>
                                Portal Komplek Bojong Malaka Indah
                            </p>

                            <p style="font-size:12px; color:#999999; margin-top:24px;">
                                &copy; {{ date('Y') }} Serenity. All rights reserved.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>

</html>