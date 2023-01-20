<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nuestros <span>productos</span>
            </h2>
        </div>
        <div style="margin-left: 360px; display: inline-block">
            <a class="btn btn-success" href="{{ url('order_by_desc') }}">Precio descendente</a>
            <a class="btn btn-success" href="{{ url('order_by_asc') }}">Precio ascendente</a>
            <a class="btn btn-secondary" href="{{ url('/') }}">Reiniciar</a>
        </div>
        @foreach ($category as $categories)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="heading_container">
                    <h2><br>
                        {{ $categories->category_name }}
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($product as $products)
                    @if ($categories->category_name == $products->category)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="{{ url('product_details', $products->id) }}" class="option1">
                                            Detalles del Producto
                                        </a>

                                        <form action="{{ url('add_cart', $products->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="number" name="quantity" value="1" min="1"
                                                        style="width: 100px">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" value="Añadir al carrito">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="product/{{ $products->image }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $products->title }}
                                    </h5>
                                    <h6 style="color: red">
                                        Precio
                                        <br>
                                        {{ $products->price }}€
                                    </h6>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</section>
