@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <form action="{{ route('subirFoto') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <h5>Subir Una foto</h5>
            <label>Descripcion</label>
            <input class="form-control" type="text" name="descripcion" placeholder="Agregue una descripcion">
            <input class="form-control" type="file" name="foto">
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
        <div class="row row-cols-3 mt-5">
            @foreach($fotos as $foto)
            <div class="col">
                <div class="card">
                    <img height="200" src="/foto/{{$foto->ruta}}">
                    <div class="card-body">
                        <p class="card-text">{{$foto->descripcion}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{$foto->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection