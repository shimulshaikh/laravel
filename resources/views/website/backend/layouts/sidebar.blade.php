<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>

    <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Products <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li class="{{ 'productCategory'  == request()->path() ? 'active' : ''}}"><a href="{{ route('productCategory.index') }}">Product Category</a></li>
            <li><a href="{{ route('product.index') }}">Product</a></li>
            <li><a href="{{ route('productImage.index') }}">Product Images</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-male"></i> Customer & Paymets <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('customerDetali.index') }}">Customer Details</a></li>
            <li><a href="{{ route('payment.index') }}">Payments</a></li>
          </ul>
        </li>


        <li><a><i class="fa fa-fax"></i> Contacts <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('contact.index') }}">Company Contact</a></li>
            <li><a href="{{ route('contactForm.index') }}">Customer Form</a></li>
          </ul>
        </li>  
    </ul>
  </div>
</div>