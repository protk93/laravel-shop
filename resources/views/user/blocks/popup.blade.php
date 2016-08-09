<div class="container popup">
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          <form method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <?php
          //lấy sản phẩm trong giỏ hàng ra
          $content = Cart::content();
          $count = Cart::count();
          ?>
          @if ($count>0)
          @foreach ($content as $item)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{!!asset('resources/upload/50x50/'.$item['options']['image'])!!}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{!!$item['name']!!}</a></td>
            <td class="quantity">
                <input class="span1 qty" type="text" size="1" value="{!!$item['qty']!!}" name="quantity[40]" disabled="disabled" >
            </td>
            <td class="price">{!!number_format($item['price'])!!}</td>
            <td class="total">{!!number_format($item['price']*$item['qty']) !!}</td>
             
          </tr>
          @endforeach
          @endif
          </form>
        </table>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tiếp Tục</button>
          <button type="button" class="btn btn-default"><a href="{!!url('gio-hang')!!}">Giỏ Hàng</a></button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>