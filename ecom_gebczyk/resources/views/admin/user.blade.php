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
                    <h1>Añadir Usuario</h1><br>
                    <form action="{{ url('/add_user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Nombre Usuario</label>
                            <input class="text_color" type="text" name="name" placeholder="Nombre del usuario"
                                required>
                        </div>
                        <div class="div_design">
                            <label for="">Email Usuario</label>
                            <input class="text_color" type="email" name="email" placeholder="Email del usuario"
                                required>
                        </div>
                        <div class="div_design">
                            <label for="">Contraseña Usuario</label>
                            <input class="text_color" type="password" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="div_design">
                            <label for="">Tipo Usuario</label>
                            <select class="text_color" name="usertype" id="" required>
                                <option value="0" selected>0</option>
                                <option value="1">1
                                </option>

                            </select>
                        </div>

                        <div class="div_design">

                            <input type="Submit" value="Añadir Usuario" class="btn btn-primary">
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
