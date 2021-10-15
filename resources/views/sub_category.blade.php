@extends('welcome')
@section('content')

<div class="row m-3">
    <div class="col-md-12">

    <div class="card" >
        <div class="card-header">
          Sub Category  <a href="{{ route('subcat.create') }}" class="float-right btn btn-primary">Add New</a>
        </div>



          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>

                <th scope="col">Des</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['category']['name'] }}</td>
                    <td>{{ Illuminate\Support\Str::limit($item->description, 20) }}</td>
                    <td><a href="{{route('delete',$item['id'])  }}" type="button" class="btn btn-danger">Delete</a>
                    </td>


                  </tr>
                @endforeach


            </tbody>
          </table>

      </div>
</div>
</div>

@endsection
