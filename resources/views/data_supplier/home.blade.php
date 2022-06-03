@extends('layout.master')

@section('content')
    <style> 
        .nama {
            text-align: center;
            font-size: 50px;   
            font-family: "Trebuchet MS", Helvetica, sans-serif;           
        }
        h4 { 
            font-family: "Trebuchet MS", Helvetica, sans-serif;           
        }
        .nama img {
            width: 1200px;
            height: 600px;
        }
    </style>    
    <h4>Welcome</h4>
    <div class="nama">
        VegeFruit<br><hr>
        <img src="{{ asset('style/img/buah_sayur2.jpg') }}">
    </div>
@endsection