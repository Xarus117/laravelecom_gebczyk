<!DOCTYPE html>
<html lang="en">



@include('admin.head')
<style type="text/css">
    .div_center {
        text-align: center;
        padding-top: 40px
    }

    .h2font {
        font-size: 40px;
        padding-top: 40px
    }

    .input {
        color: black;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
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

                <div class="div_center">
                    <h2 class="h2font">Añadir Categoría</h2>
                    <form action="{{ url('/add_category') }}" method="POST"><br>

                        @csrf
                        <input class="input" type="text" name="category" placeholder="Nombre de la categoría">
                        <input type="submit" class="btn btn-primary" name="submit" value="Añadir Categoría">
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <td>Nombre Categoría</td>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td><a onclick="return confirm('¿Estás segur@ que quieres eliminar la Categoría?')"
                                    class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Borrar</a>
                            </td>
                            <td><a onclick="return confirm('¿Estás segur@ que quieres editar la Categoría?')"
                                    class="btn btn-success" href="{{ url('update_category', $data->id) }}">Editar</a>
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
