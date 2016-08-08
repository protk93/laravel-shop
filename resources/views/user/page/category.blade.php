@extends('user.master')
@section('content') 
<section id="product">
  <div class="container">
   <!--  breadcrumb -->  
   <ul class="breadcrumb">
    <li>
      <a href="#">Home</a>
      <span class="divider">/</span>
    </li>
    <li class="active">Category</li>
  </ul>
  <div class="row">        
    <!-- Sidebar Start-->
    <aside class="span3">
     <!-- Category-->  
     <div class="sidewidt">
      <h2 class="heading2"><span>Categories</span></h2>
      <ul class="nav nav-list categories">
      @if($menuCate)
        @foreach($menuCate as $cate)
          <li>
            <a href="{!!url('loai-san-pham',[$cate->id,$cate->alias])!!}">{!!$cate->name!!}</a>
          </li>
        @endforeach
      @else
          <li>
            <a href="{!!url('/')!!}">Trang Chủ</a>
          </li>
      @endif
      </ul>
    </div>
    <!--  Best Seller -->  
    <div class="sidewidt">
      <h2 class="heading2"><span>Best Seller</span></h2>
      <ul class="bestseller">
        <li>
          <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
          <a class="productname" href="product.html"> Product Name</a>
          <span class="procategory">Women Accessories</span>
          <span class="price">$250</span>
        </li>
        <li>
          <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
          <a class="productname" href="product.html"> Product Name</a>
          <span class="procategory">Electronics</span>
          <span class="price">$250</span>
        </li>
        <li>
          <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
          <a class="productname" href="product.html"> Product Name</a>
          <span class="procategory">Electronics</span>
          <span class="price">$250</span>
        </li>
      </ul>
    </div>
    <!-- Latest Product -->  
    <div class="sidewidt">
      <h2 class="heading2"><span>Latest Products</span></h2>
      <ul class="bestseller">
      @foreach($lastedProduct as $item)
        <li>
          <img  src="{!!asset('resources/upload/50x50/'.$item->image)!!}" alt="product" title="product">
          <a class="productname" href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}"> {!!$item->name!!}</a>
          <span class="procategory">{!!$item->cateName!!}</span>
          <span class="price">{!!number_format($item->price)!!}</span>
        </li>
      @endforeach
      </ul>
    </div>
    <!--  Must have -->  
    <div class="sidewidt">
      <h2 class="heading2"><span>Must have</span></h2>
      <div class="flexslider" id="mainslider">
        <ul class="slides">
          <li>
            <img src="{!!url('public/user/img/banner_cate2.jpg')!!}" alt="" />
          </li>
          <li>
            <img src="{!!url('public/user/img/banner_cate.jpg')!!}" alt="" />
          </li>
        </ul>
      </div>
    </div>
  </aside>
  <!-- Sidebar End-->
  <!-- Category-->
  <div class="span9">          
    <!-- Category Products-->
    <section id="category">
      <div class="row">
        <div class="span9">
         <!-- Category-->
         <section id="categorygrid">
          <ul class="thumbnails grid">
          @if($product->total()>0) 
          @foreach ($product as $item)
            <li class="span3">
              <a class="prdocutname" href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a>
              <div class="thumbnail">
                
                <a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}"><img alt="" src="{!!asset('resources/upload/270x350/'.$item->image)!!}"></a>
                <div class="pricetag">
                  <span class="spiral"></span><a href="{!!url('mua-hang',[$item->id,$item->alias])!!}" class="productcart">ADD TO CART</a>
                  <div class="price">
                    <div class="pricenew">{!!number_format($item->price)!!}</div>
                    <div class="priceold"></div>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
          </ul>
          <div class="pagination pull-right">
            <ul>
              @if($product->currentPage() != 1)
              <li><a href="{!!$product->previousPageUrl()!!}">Prev</a>
              @endif
              </li>
              @for ($i=1; $i<=$product->lastPage();$i++ )
              <li class="{!!($product->currentPage() == $i)?'active':''!!}">
                <a href="{!!$product->url($i)!!}">{!!$i!!}</a>
              </li>
              @endfor
              @if($product->currentPage() != $product->lastPage())
              <li><a href="{!!$product->nextPageUrl()!!}">Next</a>
              @endif
              </li>
            </ul>
          </div>
          @else
          <h3>Dữ liệu đang cập nhật</h3>
          @endif
        </section>
      </div>
    </div>
  </section>
</div>
</div>
</div>
</section>
@endsection