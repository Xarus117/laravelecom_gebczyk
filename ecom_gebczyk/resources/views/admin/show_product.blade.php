<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<style type="text/css">
    .center {
        margin: auto;
        width: 50%;
        border: solid white;
        margin-top: 40px
    }

    .font_size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px
    }

    .img_size {
        width: 150px;
        height: 100px;
    }

    .th_color {
        background-color: skyblue;
    }

    .th_deg {
        padding: 30px;
    }
</style>

<body>
    <div class="container-scroller">
        @include('admin.sidebar');
        <div class="main-panel" style="margin-right: 200px">

            <div style="margin-left: 1200px;">
                <h1>Administrador</h1>
                <x-app-layout>
                </x-app-layout><br>
            </div>
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Nombre Producto</th>
                        <th class="th_deg">Descripción Producto</th>
                        <th class="th_deg">Cantidad Producto</th>
                        <th class="th_deg">Categoría Producto</th>
                        <th class="th_deg">Precio Producto</th>
                        <th class="th_deg">Imágen Producto</th>
                        <th class="">Borrar</th>
                        <th class="">Editar</th>
                    </tr>

                    @foreach ($product as $product)
                        <tr>
                            <td class="th_deg">{{ $product->title }}</td>
                            <td class="th_deg">{{ $product->description }}</td>
                            <td class="th_deg">{{ $product->quantity }}</td>
                            <td class="th_deg">{{ $product->category }}</td>
                            <td class="th_deg">{{ $product->price }}</td>
                            <td class="th_deg">
                                <img class="img_size" src="/product/{{ $product->image }}" alt="">
                            </td>

                            <td>
                                <a class="btn btn-danger"
                                    onclick="return confirm('¿Estás segur@ que quieres eliminar este producto?')"
                                    href="{{ url('delete_product', $product->id) }}">Borrar</a>
                            </td>
                            <td>
                                <a class="btn btn-success"
                                    onclick="return confirm('¿Estás segur@ que quieres editar este producto?')"
                                    href="{{ url('update_product', $product->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
    @include('admin.script')
</body>

</html>
