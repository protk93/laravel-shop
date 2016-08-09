<div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <a href="index-2.html" class="logo pull-left"><img src="{{url('public/user/img/logo.png')}}" alt="SimpleOne" title="SimpleOne"></a>
          <!-- Top Nav Start -->
          <div class="pull-left">
            <div class="navbar" id="topnav">
              <div class="navbar-inner">
                <ul class="nav" >
                  <li><a class="home active" href="#">Home</a>
                  </li>
                  <li><a class="myaccount" href="#">My Account</a>
                  </li>
                  <li><a class="shoppingcart" href="{!!url('gio-hang')!!}">{!!Cart::count()!!}</a>
                  </li>
                  <li><a class="checkout" href="#">CheckOut</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Top Nav End -->
        </div>
      </div>
    </div>
  </div>
<div class="container">
 <div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
    <li><a href="{{url('/')}}">Trang Chủ</a></li>
    <?php $menu_lv1 = DB::table('cates')->where('parent_id','0')->get();  ?>
      @foreach ($menu_lv1 as $item_lv1)
      <li><a href="#">{!!$item_lv1->name!!}</a>
        <div>
          <ul>
          <?php $menu_lv2 = DB::table('cates')->where('parent_id',$item_lv1->id)->get();  ?>
            @foreach ($menu_lv2 as $item_lv2)
            <li><a href="{!!url('loai-san-pham',[$item_lv2->id,$item_lv2->alias])!!}">{!!$item_lv2->name!!}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </li>
       @endforeach
      <li><a href="{!!url('lien-he')!!}">Contact</a>
      </li>         
    </ul>
  </nav>
</div>
</div>