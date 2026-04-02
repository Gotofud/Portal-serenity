<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="
                border:1px solid #000;
                padding:8px;
                font-weight:bold;
                text-align:center;
                background-color:#f2f2f2;
            ">
                No
            </th>
            <th
                style="border:1px solid #000; padding:8px; font-weight:bold; text-align:center; background-color:#f2f2f2;">
                No RW
            </th>
            <th
                style="border:1px solid #000; padding:8px; font-weight:bold; text-align:center; background-color:#f2f2f2;">
                Nama Ketua
            </th>
            <th
                style="border:1px solid #000; padding:8px; font-weight:bold; text-align:center; background-color:#f2f2f2;">
                Status
            </th>
            <th
                style="border:1px solid #000; padding:8px; font-weight:bold; text-align:center; background-color:#f2f2f2;">
                Created At
            </th>
            <th
                style="border:1px solid #000; padding:8px; font-weight:bold; text-align:center; background-color:#f2f2f2;">
                Updated At
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rws as $index => $rw)
            <tr>
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    {{ $index + 1 }}
                </td>
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    {{ $rw->no }}
                </td>
                <td style="border:1px solid #000; padding:6px;">
                    {{ $rw->leader_name }}
                </td>
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    @if ($rw->status == 'Aktif')
                                <span style="
                            display:inline-block;
                            padding:4px 8px;
                            color:#fff;
                            background-color:#28a745;
                            font-weight:bold;
                        ">
                                    {{ $rw->status }}
                                </span>
                    @else
                                <span style="
                            display:inline-block;
                            padding:4px 8px;
                            color:#fff;
                            background-color:#dc3545;
                            font-weight:bold;
                        ">
                                    {{ $rw->status }}
                                </span>
                    @endif
                </td>
                <td style="border:1px solid #000; padding:6px;">
                    {{ \Carbon\Carbon::parse($rw->created_at)->format('d M Y , H:i') }}
                </td>
                <td style="border:1px solid #000; padding:6px;">
                    {{ \Carbon\Carbon::parse($rw->updated_at)->format('d M Y , H:i') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>