@extends('layout.app')
@section('meta-description', 'Vista para cargar la informacion del cronograma')
@section('title','Importar Cronograma.')
@section('content')

@section('header')
        @include('partials.header')
@endsection


    @section('sidebar')
        @include('partials.sidebar')
    @endsection

        @section('navbar')
            @include('partials.navbar')
        @endsection

            @section('content')
                <x-alert>
                </x-alert>
                <ul class="breadcrumbs">
                    <li class="lii"><a class="aa" href="#">Importar Cronograma</a></li>
                    <li class="lii" class="divider">|</li>
                    <li class="lii"><a class="aa" class="active">Dashboard</a></li>
                </ul>
                <div class="container-create-schedule">
                    <h3>Importar documento</h3>
                    <p>Por favor verificar el formato y la extensión del documento al momento de seleccionarlo para así evitar errores al cargar los datos en la base de datos del sistema, este campo solo permite extensiones .xlsx (Excel) o .csv.</p>
                    <div class="icon-exten-box">
                        <img src="{{url('asset/images/xlsx.png')}}" alt="">
                        <img src="{{url('asset/images/csv.png')}}" alt="">
                    </div>
                    <form action="{{route('schedule.import')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="file" class="upload-box" name="schedule">
                        <input class="btn-import-doc" type="submit" value="Importar Documento">
                    </form>
                </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection