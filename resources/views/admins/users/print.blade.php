<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>   
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
 
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
    </style> 
</head>
<body>
  
    {{-- <div class="container"> --}}
      <h1>Daftar User</h1>
      <table>
          <tr>
            <th>User ID</th>
            <th>Name</th>                                
            <th>Email</th>
            <th>Roles</th>                                
          </tr>          

          @foreach ($user as $item)
          <tr>
            <td>ID-PRO-{{$item->id}}</td>
            <td>{{$item->name}}</td>                                
            <td>{{$item->email}}</td>
            <td>{{$item->roles}}</td>                                
          </tr>    
          @endforeach    
      </table>
    </div>
</body>
</html>