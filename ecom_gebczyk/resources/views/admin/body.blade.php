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

    #button {
        font-size: 30px
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
                <div style="display: inline-block; margin-left: 200px; margin-top: 100px">
                    <a id="button" class="btn btn-success btn-lg" href="{{url('/view_category')}}">Ver Categorías</a>
                    <a id="button" class="btn btn-success btn-lg" href="{{url('/view_user')}}">Ver Usuarios</a>
                    <a id="button" class="btn btn-success btn-lg" href="{{url('/view_product')}}">Ver Productos</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('admin.script')
</body>

</html>
