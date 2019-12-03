<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>

    <th>#</th>
    <th>Message Id</th>
    <th>Subjetct</th>
    <th>Message</th>
    <th>Date Sent</th>
    <th>Status</th>
    <th>Date Received</th>
  </tr>
  @if(!empty($data))
    @foreach($data as $key=>$record)
    <tr>
       
        <td>{{++$key}}</td>
        <td>{{$record->message_id}}</td>
        <td>{{$record->subject}}</td>
        <td>{{$record->message}}</td>
        <td>{{$record->day}} {{$record->month}} {{$record->year}} : {{$record->dayTime}}</td>
        <td>Received</td>
        <td>{{$record->day}} {{$record->month}} {{$record->year}} : {{$record->dayTime}}</td>
       
    </tr>
    @endforeach
  @endif

</table>

</body>
</html>
