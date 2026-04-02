<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi OTP</title>
</head>

<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
        <h2 style="color: #007bff; text-align: center;">Kode OTP Anda</h2>
        <p>Halo,</p>
        <p>Terima kasih telah mendaftar. Gunakan kode OTP di bawah ini untuk memverifikasi akun Anda:</p>

        <div style="text-align: center; margin: 30px 0;">
            <span
                style="font-size: 32px; font-weight: bold; letter-spacing: 5px; background: #f4f4f4; padding: 10px 20px; border-radius: 5px; border: 1px dashed #bbb;">
                {{ $otp }}
            </span>
        </div>

        <p>Kode ini hanya berlaku selama <strong>10 menit</strong>. Jangan bagikan kode ini kepada siapapun.</p>
        <p>Jika Anda tidak merasa melakukan pendaftaran, abaikan email ini.</p>
        <hr style="border: 0; border-top: 1px solid #eee;">
        <p style="font-size: 12px; color: #777; text-align: center;">&copy; {{ date('Y') }} {{ config('app.name') }}.
            All rights reserved.</p>
    </div>
</body>

</html>