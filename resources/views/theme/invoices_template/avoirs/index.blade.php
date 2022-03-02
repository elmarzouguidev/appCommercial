<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ optional($invoice->client)->entreprise }} - {{ $invoice->invoice_date }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 5px;
            margin-bottom: 5px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 2px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 15px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr td:nth-child(3) {
            text-align: right;
        }

        .invoice-box table tr td:nth-child(4) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 2px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.heading-price td {
            background: #eee;
            /*border-bottom: 2px solid #325288;*/
            font-weight: bold;
            text-align: right;
        }

        .invoice-box table tr.details td {
            padding-bottom: 10px;
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

        .invoice-box table tr.total td:nth-child(3) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .bott {
            height: 0px;
            width: 200px;
            border-bottom: solid #1572A1 20px;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title" style="text-align: center;">
                            <img src="{{ $companyLogo }}"
                                style="height: 60px"/>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td style="width: 50% ;">
                            <strong>Client : {{ optional($invoice->client)->entreprise }}</strong> <br/>
                            ICE : {{ optional($invoice->client)->ice }}<br/>
                            Adresse : {{ optional($invoice->client)->addresse }} <br/>

                        </td>
                        <td>
                            <strong>FACTURE AVOIR N° : {{ $invoice->code }}</strong><br/>
                            Date de facturation : {{ $invoice->invoice_date->format('d-m-Y') }}<br/>

                            <strong>FACTURE N° : {{ $invoice->invoice_number }}</strong><br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{--<tr class="heading">
            <td colspan="4">Réferences client</td>

        </tr>
        <tr class="details">
            <td colspan="4">
                BL : {{ $invoice->bl_code }}

                BC : {{ $invoice->bc_code }}
            </td>
        </tr>--}}

        <tr class="heading">
            <td>Désignation</td>
            <td>Qté</td>
            <td>P.U HT</td>
            <td>Montant HT</td>
        </tr>

        @foreach ($invoice->articles as $article)

            <tr class="item {{ $loop->last ? 'last' : '' }}">
                <td style="width: 55% ;">{{ $article->designation }}</td>
                <td>{{ $article->quantity }}</td>
                <td>{{ $article->formated_prix_unitaire }} DH</td>
                <td>{{ $article->formated_montant_ht }} DH</td>
            </tr>
        @endforeach

        <div class="pricer">
            <tr class="heading-price lefter">
                <td colspan="4">Montant HT : {{ $invoice->formated_price_ht }} DH</td>
            </tr>
            <tr class="heading-price lefter">
                <td colspan="4">Montant TVA : {{ $invoice->formated_total_tva }} DH</td>
            </tr>
            <tr class="heading-price lefter">
                <td colspan="4">Montant TTC : {{ $invoice->formated_price_total }} DH</td>
            </tr>
        </div>

    </table>
</div>

@if(isset($invoice->condition_general))
    <div style="text-align: left;font-size: 12px;color:black">
        <p>Condition général</p>
        <p>{{$invoice->condition_general}}</p>
    </div>
@endif

<div style="position: fixed; bottom: 0; width: 100%;">
    <div style="text-align: center; color:#333; font-size: 14px">
        <p>{{ optional(getCompany())->name }}</p>
        <p>
            {{ optional(getCompany())->addresse }}
            Tel : {{ optional(getCompany())->telephone }}
            E-mail : {{ optional(getCompany())->email }}
        </p>
        <p>
            -R.C:{{ optional(getCompany())->rc }}
            -PATENTE:{{ optional(getCompany())->patente }}
            -I.F:{{ optional(getCompany())->if }}
            -CNSS:{{ optional(getCompany())->cnss }}
            -ICE:{{ optional(getCompany())->ice }}
        </p>
    </div>
    <div class="bott" style=" width: 100%;">
    </div>
</div>

</body>

</html>
