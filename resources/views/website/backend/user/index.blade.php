@extends('website.backend.layouts.main')

@section('content')

<div class="x_content">
  <div class="row justity-content-center">
    <div class="col-md-8">
      @include('partials.alerts')
      <div class="card">
        <div class="card-header">
               Users
        </div>
        <div class="card-body">
               
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Roles</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                      @php
                       $i = 0;
                      @endphp

                  <tbody>
                    @foreach($users as $user)  
                    <tr>
                      <th scope="row">{{++$i}}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <td>
                        @can('edit-user')
                          <a href="{{route('user.edit',$user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                        @endcan
                        @can('delete-user')  
                          <form action="{{route('user.destroy',$user->id)}}" method="POST" class="float-left">
                            @method('DELETE')
                            @csrf
                              <button class="btn btn-warning" onclick="return confirm('Are you sure to delete')">Delete</button>
                          </form>
                        @endcan  
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection