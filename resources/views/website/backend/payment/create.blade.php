@extends('website.backend.layouts.main')

@section('content')

					<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Create Payment</h2>
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
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('payment.store') }}">

										@csrf

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Customer Name
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="customerId">
													@foreach($customerDetalis as $customerDetali) 
													<option value="{{ $customerDetali->id }}">{{ $customerDetali->firstName.' '.$customerDetali->lastName }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Total Payment
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" min="1" name="total" class="form-control @error('total') is-danger @enderror" value="{{ old('total') }}">

												@error('total')
													<p class="help is-danger">{{ $errors->first('total') }}</p>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Payment Type
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="paymentType">
													<option value="cash" name="paymentType">Cash on delivery</option>
													<option value="card" name="paymentType">Card</option>
												</select>
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