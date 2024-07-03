<!-- Path: resources/views/sales/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-box {
            width: 80%;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .invoice-box table {
            width: 100%;
            line-height: 1.6;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>Eat Dimsum</h2>
                                <p>Alamat: Ngabul, Tahunan, Jepara</p>
                                <p>No Telp: 089618236759</p>
                            </td>
                            <td>
                                Tanggal: {{ $sale->created_at }}<br>
                                Invoice #: {{ $sale->id }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Nama Pemesan: {{ $sale->customer_name }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Produk</td>
                <td>Jumlah</td>
            </tr>
            @foreach ($sale->products as $product)
            <tr class="item">
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>Total: {{ $sale->total_price }}</td>
            </tr>
        </table>
    </div>
</body>

</html>