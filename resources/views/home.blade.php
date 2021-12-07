@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Configuracion</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach($role as $item)
                                            <li class="list-group-item">                           
                                                <a href="/{{ $item->name }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endforeach                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            
                            @if(Auth::check())
                                @if (Auth::user()->isAdmin())
                                <div class="card">
                                    <div class="card-header">Agregar Documentos</div>
                                    <div class="card-body">
                                        @include('partials.files')
                                    </div>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Titulo</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($files as $file)
                                                    <tr>
                                                        <td><img src="{{ url('uploads/'.$file->name) }}" class="img-thumbnail" alt="" title=""  width="150" height="200"/></td>
                                                        <td><a href="{{ route('file.download', $file->name) }}"  class="btn btn-link">descargar</a></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2">Sin archivos.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                @endif
                            @endif     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
