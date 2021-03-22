<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stoklar Listeleniyor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
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
            <h2 class="mb-4"> Stok  Güncelle</h2>
            <form action="{{URL::route('stockEdit', array('id'=>$stock->id))}}" method="post">
                @csrf
                @method('POST')
                <select class="form-control" >
                    @php
                        $product = \App\Models\Product::where('id',$stock->product_id)->first();
                        $allproducts = \App\Models\Product::all();
                    @endphp
                    <option value="{{$stock->product_id}}" disabled selected>{{$product->ad}}</option>
                    @foreach($allproducts as $allproduct)
                        <option value="{{$allproduct->id}}">{{$allproduct->ad}}</option>
                    @endforeach
                </select>
                <hr>
                <input type="hidden" name="id" value="{{ $stock->id }}">
                <input type="text" name="stokAdeti" value="{{$stock->stokAdeti}}" placeholder="Ürün Adı Giriniz" id="" class="form-control"> <hr>

                <hr>
                <input type="submit" class="btn btn-success" value="Stok Güncelle">
            </form>
            <hr>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
