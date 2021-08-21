
<div class="dropdown-menu">
    <div class="row total-header-section">
        <div class="col-lg-6 col-sm-6 col-6">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </div>
        @php $total = 0 @endphp
        @foreach((array) session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach
        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
            <p>Total: <span class="text-info">N: {{ $total }}</span></p>
        </div>
    </div>
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            <div class="row cart-detail">
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                   <table  width="100%" class="" cellspacing="0">
                       <thread>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                       </thread>
                       <tbody>
                           <tr>
                               <td> <span class="">{{ $details['name'] }}</span></td>
                               <td><span class="">{{ $details['quantity'] }}</span></td>
                               <td><span class=""> {{ $details['price'] }}</span></td>
                            </tr>
                       </tbody>
                   </table>
                </div>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
