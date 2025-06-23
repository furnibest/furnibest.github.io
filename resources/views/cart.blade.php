@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $details)
                @php $total += $details['price'] * $details['quantity']; @endphp
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/' . $details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Update</button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td class="text-center"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" class="text-end">
                    <a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <form action="{{ route('cart.checkout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
    @else
        <div class="alert alert-warning">Your cart is empty.</div>
        <div class="text-center">
            <a href="{{ url('/products') }}" class="btn btn-primary">Go Shopping</a>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    // Tambahkan Javascript untuk update dan remove item jika diperlukan
    // Contoh:
    // $(".update-cart").click(function (e) { ... });
    // $(".remove-from-cart").click(function (e) { ... });
</script>
@endsection 