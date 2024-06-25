<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuratKeluar</title>
    <style>
        .content {
            white-space: pre-line;
            margin: 0; 
            padding: 0; 
        }
        .content p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <table align="center" width="500">
        <tr>
            <td> <img src="{{ public_path('images/logo.png') }}" alt="Logo" height="70"></td>
            <td>
                <center>
                    <font size="5">INVESTIGASIMABES</font><br>
                    <font size="4">PT. Rudesta Cakra Komunika </font><br>
                    <font size="2">Digital Media | Cyber Adv | Sosial Control | Tabloids</font>
                    <font size="2">Jl. Pisangan Lama 3 No. 27 Pulo Gadung, Jakarta Timur DKI Jakarta (+62 812-7681-7286)</font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
    </table>

    <table align="center" width="500">
        <tr>
            <td>No. Surat</td> 
            <td> : {{ $buatsurat->nomor_surat }}</td>
            <td align="right"> {{ $buatsurat->tanggal_surat }}</td> 
        </tr>
        <tr>
            <td>Perihal</td> 
            <td> : {{ $buatsurat->perihal }}</td> 
        </tr>
    </table>
    <br>

    <table align="center" width="500">
        <tr>
            <td>Kepada Yth.</td>
        </tr>
        <tr>
            <td>Bapak/Ibu {{ $buatsurat->tujuan }}</td>
        </tr>
    </table>
    <br>
    <table align="center" width="500">
        <tr>
            <td colspan="2" class="content">
                {!! nl2br(e($buatsurat->isi)) !!}
            </td>
        </tr>
    </table>

    <br>
    <table align="justify" width="500">
        <tr>
            <td align="left">
                <center>{{ $buatsurat->tanggal_surat }}</center>
                <center>Pimpinan Redaksi</center>
            </td>
            <td align="right">
                <center>Disetujui,</center>
                <center>Sekretaris</center>
            </td>
            <td></td>
        </tr>
        <tr>
            <td height="70"></td>
        </tr>
        <tr>
            <td>
                <center>Rudi Andesta</center>
            </td>
            <td align="right">
                <center>Putra Ilham</center>
            </td>
        </tr>
    </table>

</body>

</html>