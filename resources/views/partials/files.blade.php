@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    <img src="uploads/{{ Session::get('file') }}" width="150" height="200">
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        Error.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="file" name="file" class="form-control">
        </div>
        
        <div class="col-md-6">
            <select name="user_id" id="user_id" class="form-control">
                <option value=""> Seleccione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach 
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <button type="submit" class="btn btn-success">subir</button>
        </div>
    </div>
</form>