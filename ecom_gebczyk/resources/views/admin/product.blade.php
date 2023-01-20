<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>

</head>


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

                <div class="div_center">
                    <h1>Añadir Producto</h1><br>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Producto Título</label>
                            <input class="text_color" type="text" name="title" placeholder="Nombre del producto"
                                required>
                        </div>
                        <div class="div_design">
                            <label for="">Producto Descripción</label>
                            <input class="text_color" type="text" name="description"
                                placeholder="Descripción del producto" required>
                        </div>
                        <div class="div_design">
                            <label for="">Producto Precio</label>
                            <input class="text_color" type="number" min="0" name="price"
                                placeholder="Precio del producto" required>
                        </div>
                        <div class="div_design">
                            <label for="">Producto Cantidad</label>
                            <input class="text_color" type="number" min="0" name="quantity"
                                placeholder="Unidades totales del producto" required>
                        </div>
                        <div class="div_design">
                            <label for="">Producto Categoría</label>
                            <select class="text_color" name="category" id="" required>
                                <option value="" selected>Añade una categoría aquí</option>

                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="">Producto Imágen</label>
                            <input type="file" name="image" placeholder="Imágen del producto" required>
                        </div>

                        <div class="div_design">

                            <input type="Submit" value="Añadir Producto" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>


    @include('admin.script')
</body>

</html>
