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
    <th>Member Id</th>
    <th>Name</th>
    <th>Membership Type</th>
    <th>Email</th>
    <th>Phonenumber</th>
    <th>City</th>
    <th>Organisation</th>
    <th>Job Title</th>
  </tr>
  @if(!empty($data))
    @foreach($data as $key=>$record)
    <tr>
       
        <td>{{$record->member_id}}</td>
        <td>{{$record->firstname}} {{$record->middlename}} {{$record->lastname}}</td>
        <td>{{$record->member_type}}</td>
        <td>{{$record->email}}</td>
        <td>{{$record->phonenumber}}</td>
        <td>{{$record->location}}</td>
        <td>{{$record->place_of_work}}</td>
        <td>{{$record->role}}</td>
    </tr>
    @endforeach
  @endif

</table>

</body>
</html>
