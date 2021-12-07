<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Documentos</div>
            <div class="card-body">
                @if(Auth::check())
                    <div class="mt-4">
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
                                        <td><a href="{{ route('file.download', $file->name) }}" class="btn btn-link">descargar</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Sin archivos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>