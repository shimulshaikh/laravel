@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Update Product</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br>
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('product.update',$product->id) }}">

										@csrf
										@method('PUT')

										<input type="hidden" name="id" value="{{ $product->id }}">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product Category
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="categoryId">
													@foreach($productCategorys as $products) 
													<option value="{{ $products->id }}" {{ ($products->id == $product->categoryId) ? 'selected' : '' }}>{{ $products->brandName }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="productName" class="form-control @error('productName') is-danger @enderror" value="{{$product->productName}}">

												@error('productName')
													<p class="help is-danger">{{ $errors->first('productName') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Price
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="price" class="form-control @error('price') is-danger @enderror" value="{{$product->price}}">

												@error('price')
													<p class="help is-danger">{{ $errors->first('price') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea class="form-control @error('productDesc') is-danger @enderror" name="productDesc" id="productDesc" rows="3">{{$product->productDesc}}</textarea>

											    @error('productDesc')
												<p class="help is-danger">{{ $errors->first('productDesc') }}</p>
												@enderror
											</div>
										</div>
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>


@endsection