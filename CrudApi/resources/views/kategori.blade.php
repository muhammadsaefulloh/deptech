<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Nama Kategori</th>
            <th>Desc</th>
        </thead>
        <tbody>
            @foreach ($kategori as $k)
                <tr>    
                    <td>{{$k->nama_kategori}}</td>
                    <td>{{$k->desc}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>