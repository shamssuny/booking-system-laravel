
    @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
