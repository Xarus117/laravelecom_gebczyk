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
                        <th class="th_deg">Nombre Usuario</th>
                        <th class="th_deg">Email Usuario</th>
                        <th class="th_deg">Tipo Usuario</th>
                        <th class="th_deg">Contraseña Usuario</th>
                        <th class="">Borrar</th>
                        <th class="">Editar</th>
                    </tr>

                    @foreach ($user as $user)
                        <tr>
                            <td class="th_deg">{{ $user->name }}</td>
                            <td class="th_deg">{{ $user->email }}</td>
                            <td class="th_deg">{{ $user->usertype }}</td>
                            <td class="th_deg">{{ $user->password }}</td>

                            <td>
                                <a class="btn btn-danger"
                                    onclick="return confirm('¿Estás segur@ que quieres eliminar este usuario?')"
                                    href="{{ url('delete_user', $user->id) }}">Borrar</a>
                            </td>
                            <td>
                                <a class="btn btn-success"
                                    onclick="return confirm('¿Estás segur@ que quieres editar este usuario?')"
                                    href="{{ url('update_user', $user->id) }}">Editar</a>
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
