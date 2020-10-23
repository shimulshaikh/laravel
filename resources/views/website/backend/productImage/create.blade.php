@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Create Image</h2>
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
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('productImage.store') }}" enctype="multipart/form-data">

										@csrf

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="productId">
													@foreach($products as $product) 
													<option value="{{ $product->id }}">{{ $product->productName }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image Title
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="imgTitle" class="form-control @error('productName') is-danger @enderror" value="{{ old('productName') }}">

												@error('productName')
													<p class="help is-danger">{{ $errors->first('productName') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="file">Image
											</label>
											<div class="col-md-6 col-sm-6 ">
												
												<input type="file" class="form-control @error('image') is-danger @enderror" name="image" 
											  accept = 'image/jpeg , image/jpg, image/gif, image/png, image/svg, image/webp' onchange="previewFile(this)">	

											  	@error('image')
													<p class="help is-danger">{{ $errors->first('image') }}</p>
												@enderror

											  <img id="previewImg" style="max-width: 130px;margin-top: 20px;">

												
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