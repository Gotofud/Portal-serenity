<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice Report</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .logo {
            width: 70px;
            margin: 5px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            font-size: 13px;
            margin-top: 5px;
            color: #666;
        }

        .info {
            margin-top: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 6px 0;
            vertical-align: top;
        }

        .label {
            width: 180px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 11px;
            color: #fff;
        }

        .success {
            background: #28a745;
        }

        .danger {
            background: #dc3545;
        }

        .warning {
            background: #ffc107;
            color: #000;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }

        .total {
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <img src="{{ public_path('assets/img/text-icon.svg') }}" class="logo">
        <h1 class="title">Laporan Data Pengumuman</h1>
        <div class="subtitle">Komplek Bojong Malaka Indah</div>
    </div>

    <table>
        <thead>
            <!-- start row -->
            <tr>
                <th>#</th>
                <th>Pembuat</th>
                <th>Subjek</th>
                <th>Lampiran</th>
                <th>Status Publikasi</th>
                <th>Dibuat</th>
                <th>Diperbarui</th>
            </tr>
            <!-- end row -->
        </thead>
        <tbody>
            <!-- start row -->
            @foreach ($ann as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->users->user_profile->full_name ?? $data->users->name }}</td>
                    <td>{{ $data->subject }}</td>
                    <td>@if ($data->image)
                        Melampirkan
                    @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>@if ($data->is_public == true)
                        Publik
                    @else
                            Privat
                        @endif
                    </td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            @endforeach
            <!-- end row -->
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        &copy; {{ \Carbon\Carbon::now()->format('Y') }} Serenity. All rights reserved.
    </div>

</body>

</html>