<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

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
        <div class="main-panel">
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
                    <h1>Editar Categoría</h1><br>
                    <form action="{{ url('/update_category_confirm', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Nombre Categoría</label>
                            <input value="{{ $category->category_name }}" class="text_color" type="text"
                                name="category_name" placeholder="Nombre del usuario" required>
                        </div>
                        <div class="div_design">

                            <input type="Submit" value="Editar Categoría" class="btn btn-primary">
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
