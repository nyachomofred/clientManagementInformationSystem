
<style type="text/css">
	table td, table th{
		border:1px solid black;
	}

    #watermark {
    color: #d0d0d0;
    font-size:6pt;
    -webkit-transform: rotate(-0deg);
    -moz-transform: rotate(-45deg);
    position: absolute;
    width: 100%;
    height: 100%;
    margin: 0;
    z-index: -1;
    left:-100px;
    top:-200px;
    }

</style>
@if(!empty($items))
<div class="container" style="border:10px solid #ffa31a; height:950px;">

  <center> 
  <h2>ZALEGO ACADEMY LTD</h2>
  Devan Plaza 6Th Floor Crossway Road, Westlands|PO Box 105024-00101, Nairobi<br>
 Phone: +254723 274 774 |Email:info@zalegoinstitute.ac.ke|Website:www.zalegoinstitute.ac.ke
  </center>
  <br><br>
 <h2> INVOICE <b style="color:red">status</b> 
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Date: {{Date('d/m/Y')}}
 </h2>
  <br><br>
  <center>
      <h3>PERSONAL INFORMATION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:blue">INVOICE NO: </b><b style="color:red">{{$items->invoice_no}}</b></h3>
  </center>
  <table style="width:100%; border:1px solid black">
     <thead>
        <tr>
           <th>#</th>
           <th>Item Type</th>
           <th>Description</th>
           <th>Qty</th>
           <th>Unit Price (Ksh)</th>
           <th>Amount (Ksh)</th>
        </tr>
     </thead>
     <tbody>
        @if(!empty($invoiceItems))
            @foreach($invoiceItems as $key=>$invoiceItem)
               <tr>
                  <td>{{++$key}}</td>
                  <td>{{$invoiceItem->itemType}}</td>
                  <td>{{$invoiceItem->description}}</td>
                  <td>{{$invoiceItem->qty}}</td>
                  <td>{{$invoiceItem->unitPrice}}</td>
                  <td>{{$invoiceItem->amount}}</td>
               </tr>
            @endforeach
         @else
         <p>No record found</p>
         @endif
     </tbody>
    
  </table>


  <br><br>
 <p><b>NOTE:</b> To complete registration, you will need to pay registration fee of KSH 1500. Login in to your portal and click the pay button
 .Make payment of and then download the payment slip from the download section
  </p>

</div>
@else
<p style="color:red">Could Not Find this record.</p>
@endif
