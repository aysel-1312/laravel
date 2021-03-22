<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .container
        {
            margin-top:100px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-2 bd-title">

            <ul>
                <li><a href="{{route('product')}}"><h3>ÜRÜNLER</h3> </a></li>
                <li><a href="{{route('stock')}}"><h3>STOK</h3> </a></li>
                <li><a href="{{route('report')}}"><h3>RAPOR</h3> </a></li>
            </ul>
        </div>
        <div class="col-10">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>STOK ID</th>
                    <th>URUN ID</th>
                    <th>STOK ADETİ</th>
                    <th>ÜRÜN ADI</th>
                    <th>EKLENME ZAMANI</th>
                    <th>İŞLEMLER</th>
                </tr>
                </thead>
                <tbody>
                @php
                    foreach ($report as $val) {
                @endphp
                <tr>
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->uuid }}</td>
                    <td>{{ $val->stokAdeti }}</td>
                    <td>{{ $val->ad }}</td>
                    <td>{{ $val->created_at }}</td>
                    <td>
                        <a href="{{ route('reportDelete')."/".$val->id }}" class="btn btn-danger"> SİL </a>
                        <a href="{{ route('reportUpdate')."/".$val->id }}" class="edit btn btn-success btn-sm">GÜNCELLE</a>
                    </td>
                </tr>
                @php
                    }
                @endphp
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>


<script>
    $(document).ready( function () {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    } );
</script>
</body>
</html>


