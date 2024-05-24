@extends('layout.app')
@section('meta-description', 'Vista del calendario auditorio 301')
@section('title','Auditorio 301.')
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
            <ul class="breadcrumbs">
                    <li class="lii"><a class="aa" href="#">Prestamo ambientes</a></li>
                    <li class="lii" class="divider">|</li>
                    <li class="lii"><a class="aa" class="active">Dashboard</a></li>
                </ul>
            <table class="table">
                    <thead>
                        <tr>
                         <th>CC</th>  
                         <th>Instructor</th> 
                         <th>Ambiente</th>
                         <th>Dia</th>
                         <th>Franja</th>
                         <th>Ficha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>98701432</td>
                            <td>Richard A Betancur</td>
                            <td>506</td>
                            <td>Lunes</td>
                            <td>12:00 - 15:00</td>
                            <td>2877145</td>
                        </tr>
                        <tr>
                            <td>98701432</td>
                            <td>Richard A Betancur</td>
                            <td>506</td>
                            <td>Lunes</td>
                            <td>12:00 - 15:00</td>
                            <td>2877145</td>
                            </tr>
                            <tr>
                                <td>98701432</td>
                                <td>Richard A Betancur</td>
                                <td>506</td>
                                <td>Lunes</td>
                                <td>12:00 - 15:00</td>
                                <td>2877145</td>
                                 </tr>
                            <tr>
                                <td>98701432</td>
                                <td>Richard A Betancur</td>
                                <td>506</td>
                                <td>Lunes</td>
                                <td>12:00 - 15:00</td>
                                <td>2877145</td>
                                
                            </tr>
                            <tr>
                                <td>98701432</td>
                                <td>Richard A Betancur</td>
                                <td>506</td>
                                <td>Lunes</td>
                                <td>12:00 - 15:00</td>
                                <td>2877145</td>
                                
                            </tr>
                    </tbody>
                </table>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection

        @section('codigo-javascript-body')
            <script src="{{url('asset/js/appCalendarAuditorioTres.js')}}"></script>
        @endsection

@section('main')
    @include('partials.main')
@endsection

@section('footer')
        @include('partials.footer')
@endsection