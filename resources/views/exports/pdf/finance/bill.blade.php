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
        <h1 class="title">Laporan Data IWD</h1>
        <div class="subtitle">Komplek Bojong Malaka Indah</div>
    </div>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Periode Tagihan</th>
                <th>Rumah Warga</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bill as $data)
                @php
                    $daysLeft = now()->startOfDay()->diffInDays($data->due_at->startOfDay(), false);
                    $progress = $daysLeft > 7 ? 100 : ($daysLeft > 0 ? ($daysLeft / 7) * 100 : 0);
                @endphp
                <tr>
                    {{-- NO --}}
                    <td>{{ $loop->iteration }}</td>

                    {{-- PERIODE --}}
                    <td>
                        <strong>
                            {{ $data->month}}
                            {{ $data->year }}
                        </strong><br>
                        <small style="color:#777;">{{ $data->code }}</small>
                    </td>

                    {{-- RUMAH --}}
                    <td>
                        <strong>
                            Blok {{ $data->houses->blocks->name ?? '-' }}
                            No. {{ $data->houses->number ?? '-' }}
                        </strong><br>
                        <small style="color:#777;">
                            RT {{ $data->houses->neighborhoodUnits->no ?? '-' }}
                            RW {{ $data->houses->communityUnits->no ?? '-' }}
                        </small>
                    </td>

                    {{-- BIAYA --}}
                    <td>
                        <strong>Rp {{ number_format($data->amount, 0, ',', '.') }}</strong><br>
                        <small style="color:#777;">
                            {{ $data->houses->building_Types->name ?? '-' }}
                        </small>
                    </td>

                    {{-- STATUS --}}
                    <td>
                        @if ($data->status == 'paid')
                            <span class="badge success">Sudah Lunas</span>
                        @else
                            <span class="badge danger">Belum Bayar</span>
                        @endif
                    </td>

                    {{-- JATUH TEMPO --}}
                    <td>
                        @if($daysLeft > 0)
                            <span>
                                {{ $data->due_at ? $data->due_at->format('d M Y') : '-' }}
                            </span><br>
                        @else
                            <span style="font-weight:bold; color:red;">
                                {{ $data->due_at ? $data->due_at->format('d M Y') : '-' }}
                            </span><br>
                        @endif
                        @if($daysLeft > 0)
                            ({{ floor($daysLeft) }} hari lagi)
                        @else
                            (Terlambat {{ floor(abs($daysLeft)) }} hari)
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        &copy; {{ \Carbon\Carbon::now()->format('Y') }} Serenity. All rights reserved.
    </div>

</body>

</html>