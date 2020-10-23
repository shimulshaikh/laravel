<!DOCTYPE html>
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
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      @if(Session::has('cart'))
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="assets/img/gallery/card1.png" alt="">
                        </div>
                        <div class="media-body">
                          <p>{{$product['item']['productName']}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5>${{ $product['price'] }}</h5>
                    </td>
                    <td>
                      <div class="product_count">
                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                        <input class="input-number" type="text" value="{{ $product['qty'] }}">
                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                  
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Total</h5>
                    </td>
                    <td>
                      <h5>${{ $totalPrice }}</h5>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <!-- <a class="btn_1" href="#">Continue Shopping</a> -->
                <a class="btn_1 checkout_btn_1" href="{{route('website.checkout')}}">Proceed to checkout</a>
              </div>
            </div>
          </div>
      </div>
    </section>
  @else
  
  @endif  
      <!--================End Cart Area =================-->  
    </main>
  </body>
</html>

@include('website.frontend.layouts.foot')
@include('website.frontend.layouts.footer')
