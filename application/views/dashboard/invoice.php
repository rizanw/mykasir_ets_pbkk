<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>invoice #<?php echo $transaction->transaction_id ?></title>
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
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

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <i class="fas fa-laugh-wink"></i>
                                TokoRoti
                            </td>

                            <td>
                                Invoice #: <?php echo $transaction->transaction_id ?><br>
                                Created: <?php echo $transaction->datetime ?><br>
                                Due: <?php echo $transaction->datetime ?>
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
                                TokoRoti.<br>
                                12345 Jalan makanan enak<br>
                                SundayFunday, 12345
                            </td>

                            <td>
                                <?php echo $customer->name ?><br>
                                <?php echo $customer->contact ?><br> 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payment Method
                </td>

                <td>
                </td>

                <td>
                    Status
                </td>
            </tr>

            <tr class="details">
                <td>
                    <?php foreach($wallets as $wallet):?>
                    <?php if($wallet->wallet_id == $payment->wallet_id) echo $wallet->name ?>
                    <?php endforeach ?>
                </td>

                <td>
                </td>

                <td>
                    <?php if($payment->status == 1) echo "LUNAS"; else echo "BELUM LUNAS"; ?>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Items
                </td>

                <td>
                    Qty
                </td>

                <td>
                    Price
                </td>
            </tr>
            
            <?php foreach($transaction_product as $item): ?>
            <tr class="item">
                <td>
                    <?php foreach($products as $product): ?>
                    <?php if($product->product_id == $item->product_id) echo $product->name;?>
                    <?php endforeach ?>
                </td>
                <td>
                    <?php echo $item->quantity ?> 
                </td>
                <td>
                    <?php foreach($products as $product): ?>
                    <?php if($product->product_id == $item->product_id) echo "Rp.".$product->price.",-";?>
                    <?php endforeach ?>
                </td>
            </tr> 
            <?php endforeach ?>

            <tr class="total">
                <td></td>
                <td>
                    Total: 
                </td>
                <td>
                    Rp.<?php echo $payment->amount ?>,-<br> 
                </td>
            </tr>
        </table>
    </div>
</body>

</html>