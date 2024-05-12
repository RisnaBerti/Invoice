<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemasukan</title>
</head>

<body>
    <h1>Laporan Bulanan</h1>
    <p>Tanggal: {{ $tgl_pemasukan }}</p>
    <table>
        <thead>
            <tr>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Total Pendapatan</th>
                <th>Total Piutang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($saldo as $total)
                <tr>
                    
                    <td>
                        <span>{{ number_format($total->total_debet, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <span>{{ number_format($total->total_kredit, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <span>{{ number_format($total->total_kredit - $total->total_debet, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <span>{{ number_format($total->total_piutang, 0, ',', '.') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
