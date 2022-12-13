<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{translate('invoice')}}</title>
    <link href="{{asset('public/assets')}}/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('public/assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.min.js"></script>
    <style>
        a {
            color: rgb(65, 83, 179) !important;
        }

        #invoice {
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid rgb(65, 83, 179)
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: rgb(65, 83, 179)
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid rgb(65, 83, 179)
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td, .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: rgb(65, 83, 179);
            font-size: 1.2em
        }

        .invoice table .qty, .invoice table .total, .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: rgb(65, 83, 179)
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: rgb(65, 83, 179);
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: rgb(65, 83, 179);
            font-size: 1.4em;
            border-top: 1px solid rgb(65, 83, 179)
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice > div:last-child {
                page-break-before: always
            }
        }
    </style>
</head>
<body style="background-color: #ececec;margin:0;padding:0">
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#">
                            @php($logo = business_config('business_logo','business_information'))
                            <img width="200" src="{{asset('storage/app/public/business')}}/{{$logo->live_values}}"
                                 data-holder-rendered="true"/>
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            @php($business_name = business_config('business_name','business_information'))
                            @php($business_email = business_config('business_email','business_information'))
                            @php($business_phone = business_config('business_phone','business_information'))
                            @php($business_address = business_config('business_address','business_information'))
                            <a target="_blank" href="#">
                                {{$business_name->live_values}}
                            </a>
                        </h2>
                        <div>{{$business_address->live_values}}</div>
                        <div>{{$business_phone->live_values}}</div>
                        <div>{{$business_email->live_values}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light text-uppercase">{{translate('invoice_to')}}:
                            #{{$booking->readable_id}}</div>
                        <h2 class="to">{{isset($booking->customer) ? $booking->customer->first_name.' '.$booking->customer->last_name : ''}}</h2>
                        <div class="address">{{$booking->service_address->address??""}}</div>
                        <div class="email"><a
                                href="mailto:{{isset($booking->customer)?$booking->customer->email:''}}">{{isset($booking->customer)?$booking->customer->email:''}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id text-uppercase">{{translate('invoice')}}</h1>
                        <div class="date">{{translate('date_of_invoice')}}
                            : {{date('d/m/Y H:i:s a',strtotime($booking->created_at))}}</div>
                        <div class="date">{{translate('due_date')}}
                            : {{date('d/m/Y H:i:s a',strtotime($booking->created_at))}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left text-uppercase">{{translate('description')}}</th>
                            <th class="text-left text-uppercase">{{translate('cost')}}</th>
                            <th class="text-right text-uppercase">{{translate('qty')}}</th>
                            <th class="text-right text-uppercase">{{translate('total')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($sub_total=0)
                    @foreach($booking->detail as $index=>$item)
                        <tr>
                            <td class="no">{{(strlen($index+1)<2?'0':'').$index+1}}</td>
                            <td class="text-left">
                                <h3>
                                    {{$item->service->name}}
                                </h3><br>
                                {{$item->variant_key}}
                            </td>
                            <td class="unit">{{with_currency_symbol($item->service_cost)}}</td>
                            <td class="qty">{{$item->quantity}}</td>
                            <td class="total">{{with_currency_symbol($item->total_cost)}}</td>
                        </tr>
                        @php($sub_total+=$item->service_cost*$item->quantity)
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-uppercase">{{translate('subtotal')}}</td>
                            <td>{{with_currency_symbol($sub_total)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-uppercase">{{translate('Coupon_Discount')}} </td>
                            <td>{{with_currency_symbol($booking->total_discount_amount)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-uppercase">{{translate('tax')}} %</td>
                            <td>{{with_currency_symbol($booking->total_tax_amount)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-uppercase">{{translate('grand_total')}}</td>
                            <td>{{with_currency_symbol($booking->total_booking_amount)}}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">{{translate('thank_you')}}!</div>
                <div class="notices">
                    <div class="notice">{{(business_config('footer_text','business_information'))->live_values}}</div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }

    printContent('invoice');
</script>
</body>
</html>
