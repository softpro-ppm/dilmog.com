@extends('backEnd.layouts.master')
@section('title','Manage Logo')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark">Welcome !! {{auth::user()->name}}</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Logo</a></li>
            <li class="breadcrumb-item active">Manage</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
            <div class="manage-button">
              <div class="body-title">
                <h5>Create Logo</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/logo/create')}}" class="btn btn-primary btn-actions btn-create">
                Create Logo
                </a>
              </div>
            </div>
          </div>
      </div>
        <div class="box-content">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <table id="example1" class="table table-bordered">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($show_data as $key=>$value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td><img src="{{asset($value->image)}}" class="backend_image" alt=""></td>
                          <td>@if($value->type==1) White Logo @elseif($value->type==2) Dark Logo @else Faveicon @endif</td>
                          <td>{{$value->status==1?"Active":"Inactive"}}</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton{{$value->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action Button
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$value->id}}">
                                @if($value->status==1)
                                  <form action="{{url('editor/logo/inactive')}}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                    <button type="submit" class="dropdown-item btn-active" title="unpublished"><i class="fa fa-thumbs-up"></i> Active</button>
                                  </form>
                                @else
                                  <form action="{{url('editor/logo/active')}}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                    <button type="submit" class="dropdown-item btn-active" title="published"><i class="fa fa-thumbs-down"></i> Inactive</button>
                                  </form>
                                @endif
                                <a class="dropdown-item btn-edit" href="{{url('editor/logo/edit/'.$value->id)}}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{url('editor/logo/delete')}}" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                  <button type="submit" onclick="return confirm('Are you delete this this?')" class="dropdown-item btn-delete" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection