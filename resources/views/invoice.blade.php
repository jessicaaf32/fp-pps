<?php

 $total = NULL;
 $post = $_POST;
 
 /* untuk invoice bisa di ambil dari database, karena pada dasarnya invoice tidak akan pernah recordnya itu di delete  */ 
 /* berapa jumlah invoice kemudian di tambahkan 1 */
 $numrows_invoice_db = 313;
 $invoice = $numrows_invoice_db + 1;
?>


<!DOCTYPE html>
 <head>
 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Invoice</title>
  <link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
  <style type="text/css">
    body{
        background:#efefef;
        font-family:arial;
    }
    #wrapshopcart{
        width:70%;
        margin:3em auto;
        padding:30px;
        background:#fff;
        box-shadow:0 0 15px #ddd;
    }
    h1{
        margin:0;
        padding:0;
        font-size:2.5em;
        font-weight:bold;
    }
    p{
        font-size:1em;
        margin:0;
    }
    table{
        margin:2em 0 0 0; 
        border:1px solid #eee;
        width:100%; 
        border-collapse: separate;
        border-spacing:0;
    }
    table th{
        background:#fafafa; 
        border:none; padding:20px;
        font-weight:normal;
        text-align:left;
    }
    table td{
        background:#fff; 
        border:none; 
        padding:12px  20px; 
        font-weight:normal;
        text-align:left; 
        border-top:1px solid #eee;
    }
    table tr.total td{
        font-size:1.5em;
    }
    .btnsubmit{
        display:inline-block;
        padding:10px;
        border:1px solid #ddd;
        background:#eee;
        color:#000;
        text-decoration:none;
        margin:2em 0;
    }
    form{
        margin:2em 0 0 0;
    }
    label{
        display:inline-block;
        width:auto;
    }
    input[type=text]{
        border:1px solid #bbb;
        padding:10px;width:30em;
    }
    textarea{
        border:1px solid #bbb;
        padding:10px;width:30em;
        height:5em;
        vertical-align:text-top;
        margin:0.3em 0 0 0;
    }
    .submitbtn{
        font-size:1.5em;
        display:inline-block;
        padding:10px;
        border:1px solid #ddd;
        background:#eee;
        color:#000;
        text-decoration:none;
        margin:0.5em 0 0 8em;
    };
    
  </style>
 </head>
 
 <body>
  <div id="wrapshopcart">
   <h1>Invoice {{$invoice}}</h1>
   <p>Silahkan save halaman ini ... </p>
   
   <h3>Berikut adalah data lengkap Anda : </h3>
   <label>Nama Lengkap : {{$post['name']}}</label><br />
   <label>Email : {{$post['email']}} </label><br />
   <label>No HP : {{$post['Telepon']}}</label><br />
   <label>Alamat : {{$post['Alamat']}}</label><br />
   <label>Keterangan Tambahan : {{$post['ket']}}</label><br />
   
   <h3>Produk Yang Anda Beli : </h3>
   <table>
        <tr>
            <th width="70%">Produk</th>
            <th width="10%">Quantity</th>
            <th width="20%">Jumlah</th>
        </tr>
        
        @foreach($carts as $cart)
        <?php 
            $subtotal = $cart->qty * $cart->price;
            $total+=$subtotal;
        ?>
        <tr>
            <td>{{$cart->name}}</td>
            <td>{{$cart->qty}}</td>
            <td>Rp. {{ number_format($subtotal /1000,3) }}</td>
        </tr>
        @endforeach
        
        <tr>
            <td></td>
            <td><b>Total</b></td>
            <td><b> Rp. {{ number_format($total /1000,3) }}</b></td>
        </tr>
   </table>   
   <h3>Anda sudah melakukan pembayaran melalui {{$post['pembayaran']}}</h3>
  </div>
  <a href="/clear">Kembali ke Beranda</a><br /><br />
 </body>
</html>