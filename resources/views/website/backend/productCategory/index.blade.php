@extends('website.backend.layouts.main')

@section('content')

<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <a href="{{ route('productCategory.create') }}" class="btn btn-success">Add Category</a> 
					
                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer"><div class="row"><div class="col-sm-12"><table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">

                      @if(Session::has('add_ProductCatagory'))
                          <div class="alert alert-success" role="alert">
                            {{ Session::get('add_ProductCatagory') }}
                          </div>
                      @endif

                      @if(Session::has('update_ProductCatagory'))
                          <div class="alert alert-success" role="alert">
                            {{ Session::get('update_ProductCatagory') }}
                          </div>
                      @endif

                      @if(Session::has('Delete'))
                          <div class="alert alert-success" role="alert">
                            {{ Session::get('Delete') }}
                          </div>
                      @endif

                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 66px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Product Catagory</th>

                          <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending">Status</th>

                          <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending"></th>

                          <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 65px;" aria-label="Last name: activate to sort column ascending"></th>

                        </tr>
                      </thead>
                      <tbody>
                        
                    @foreach($productCategorys as $productCategory)    
                      <tr role="row">
                          <td>{{ $productCategory->brandName }}</td>
                          <td>{{ $productCategory->slug }}</td>
                          <td>                        
                              <a class="btn btn-app" href="{{route('productCategory.edit', $productCategory->id)}}">
                                  <i class="fa fa-edit"></i> Edit
                              </a>

                          </td>
                          <td>    
                              <form  action="{{route('productCategory.destroy', $productCategory->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                              <button class="btn btn-app" onclick="return confirm('Are you sure to delete')">
                                  <i class="fa fa-warning"></i> Delete
                              </button>
                              </form>

                          </td>
                      </tr>
                    @endforeach  
                      
                        </tbody>
                    </table></div></div></div>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>

@endsection