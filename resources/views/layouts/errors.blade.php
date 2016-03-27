@forelse ($errors->all() as $error)
    <h4><p class="bg-danger ">{{$error}}</p></h4>
@empty
@endforelse