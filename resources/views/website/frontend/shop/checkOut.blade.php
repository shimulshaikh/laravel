
<!doctype html>
<html lang="zxx">

   @include('website.frontend.layouts.head')
<body>
  @include('website.frontend.layouts.header')

    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Checkout Area =================-->
        <section class="checkout_area section_padding">
          <div class="container">
            
            <div class="billing_details">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Billing Details</h3>
                  <form class="row contact_form" action="{{ route('website.storeOrder') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="firstName" name="firstName" />
                      <span class="placeholder" data-placeholder="First name"></span>
                    </div>

                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="lastName" name="lastName" />
                      <span class="placeholder" data-placeholder="Last name"></span>
                    </div>

                    <div class="col-md-12 form-group">
                      <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company name" />
                    </div>

                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="phone" name="phone" />
                      <span class="placeholder" data-placeholder="Phone number"></span>
                    </div>

                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="email" name="email" />
                      <span class="placeholder" data-placeholder="Email Address"></span>
                    </div>

                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="country" name="country" />
                      <span class="placeholder" data-placeholder="Country"></span>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="address1" name="address1" />
                      <span class="placeholder" data-placeholder="Address line 01"></span>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="address2" name="address2" />
                      <span class="placeholder" data-placeholder="Address line 02"></span>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="town" name="town" />
                      <span class="placeholder" data-placeholder="Town/City"></span>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="district" name="district" />
                      <span class="placeholder" data-placeholder="District"></span>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="postCode" name="postCode" />
                      <input type="hidden" class="form-control" id="totalPrice" name="totalPrice" value="{{$totalPrice}}" />
                      <span class="placeholder" data-placeholder="Post Code"></span>
                    </div>

                    <div class="col-md-12 form-group">
                      <textarea class="form-control" name="otherNotes" id="otherNotes" rows="1"
                        placeholder="Order Notes"></textarea>
                    </div>

                    <div class="radion_btn">
                      <input type="radio" id="f-option5" name="paymentType" value="cash">
                        <label for="f-option5">Cash on delivery</label>
                      <div class="check"></div>
                    </div>

                    <div class="radion_btn">
                      <input type="radio" id="f-option5" name="paymentType" value="card">
                        <label for="f-option5">Card</label>
                      <div class="check"></div>
                    </div>

                    <button class="btn_3" type="submit">Proceed to order</button>
                  </form>
                </div>
                <div class="col-lg-4">
                 
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--================End Checkout Area =================-->
    </main>
    
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

<!-- JS here -->
  @include('website.frontend.layouts.foot')
</body>
</html>