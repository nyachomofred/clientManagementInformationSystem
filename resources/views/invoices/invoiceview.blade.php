
<style type="text/css">
	 th, td {
  border: 1px solid black;
  border-collapse: collapse;
 
}

table,{
  border-top: 1px solid black;
  border-collapse: collapse;
  border-bottom:0px solid black
}

th, td {
  padding: 5px;
}
th {
  text-align: left;
}

.invoiceHeader {
  width:100%;
  height: 80px;
  background-color:#9fdf9f;
}


</style>
@if(!empty($items))
<div class="container" style="border:0px solid #ffa31ab; height:950px;">
<div class="invoiceHeader" style="height:118px;">
   <table style="border:0px solid black;width:100%;">
      <tbody>
           <tr style="border:0px solid black;width:100%;">
              <td style="border:0px solid black;width:100%; color:white;font-size:50px;">INVOICE</td>
              <td align="right" style="border:0px solid black;width:100%;">
               
               Global Learning Services <br>
               Wilson Business Park, 2nd floor Block B.<br>
               Langata Road. P.O Box 856 00606.<br>
              

              </td>
              <td align="right" style="border:0px solid black;width:100%;">
               Nairobi, Kenya <br>
               Tel: +254 722 791 703 <br>
               info@globallearning.co.ke
              </td>
           </tr>
      <tbody>
   </table>
</div>
<br><br>
<table style="border:0px solid black;width:100%;">
    
      <tbody>
         <tr style="border:0px solid black;width:100%;">
           <td style="border:0px solid black;width:100%;"><h3>Bill To</h3></td>
           <td style="border:0px solid black;width:100%;" align="right;"> <h3>Invoice No: <b style="color:blue;font-size:20px;"> {{$total->invoice_no}}</h3></td>
           <td style="border:0px solid black;width:100%;" align="right;"> <h3>Invoice Total</h3></td>
         </tr>
           <tr style="border:0px solid black;width:100%;">
              <td  style="border:0px solid black;width:100%;">
                Name: {{$items->firstname}} {{$items->lastname}} <br>
                Email:{{$items->email}}<br>
                Tel:{{$items->phonenumber}}

              </td>
              <td style="border:0px solid black;width:100%;" align="right;">
                 <b>Date of Issue</b><br>
                 12/12/2009
              </td>
              <td  style="border:0px solid black;width:100%;" align="right;">
                <b style="color:red;font-size:35px;"> Ksh {{$total->total}}.00</b><br>
              </td>
           </tr>
      <tbody>
</table>

<br><br>
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
                  <td>{{$invoiceItem->unitPrice}}.00</td>
                  <td>{{$invoiceItem->amount}}.00</td>
               </tr>
            @endforeach

            <tr>
                  <td colspan="4"></td>
                  <td colspan="2">
                     <table style="border:0px solid black;width:100%;">
                        <tbody>
                           <tr style="border:0px solid black">
                              <td style="border:0px solid black">Sub Total (Ksh)</td>
                              <td style="border:0px solid black">{{$total->total}}.00</td>
                           </tr>
                           <tr style="border:0px solid black">
                              <td style="border:0px solid black">VAT</td>
                              <td style="border:0px solid black">0.00</td>
                           </tr>

                           <tr style="border:0px solid black">
                              <td style="border:0px solid black"><b>TOTAL</b></td>
                              <td style="border:0px solid black">{{$total->total}}.00</td>
                           </tr>

                        </tbody>
                     </table>
                  </td>
                  
            </tr>
         @else
         <p>No record found</p>
         @endif
     </tbody>
    
  </table>



  <table style="border:0px solid black;width:100%;">
      <tbody>
         <tr style="border:0px solid black;width:100%;">
           <td style="border:0px solid black;width:100%;">Terms</td>
           <td style="border:0px solid black;width:100%;" align="right;"> </td>
           <td style="border:0px solid black;width:100%;" align="right;"></td>
         </tr>
           <tr style="border:0px solid black;width:100%;">
              <td  style="border:0px solid black;width:100%;">
                Please Pay  invoice by : {{$items->dueData}}

              </td>
              <td style="border:0px solid black;width:100%;" align="right;">
                Amount Due (Ksh)
              </td>
              <td  style="border:0px solid black;width:100%;" align="right;">
                Ksh : {{$total->total}}.00
              </td>
           </tr>
      <tbody>
  </table>

  
</div>
@else
<p style="color:red">Could Not Find this record.</p>
@endif
