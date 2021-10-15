@extends('welcome')

@section('content')

<div class="row m-3">

<div class="col-md-12">
    <form method="POST" action="{{ route('create.cat') }}"  enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">

        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Cat Name" name="name" value="{{ old('name')  }}" required>
          @if($errors->has('name'))
          <div class="error alert-danger">{{ $errors->first('name') }}</div>
      @endif
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Decripton</label>
          <textarea class="form-control" placeholder="Cat Description" id="exampleFormControlTextarea1" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
          <label for="exampleFormControlInput1">Image</label>
          <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Cat File" name="image">
        </div>


    </div>
</div>

<button type="submit" class="btn btn-primary mb-2">Save</button>

      </form>

</div>

</div>

@endsection
