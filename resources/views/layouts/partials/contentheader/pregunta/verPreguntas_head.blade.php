<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', trans('gogamessage.Pregunta') )
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('categorias.index') }}"><i class="fa fa-dashboard"></i> {{ trans('gogamessage.Categoria') }}</a></li>
        <li class="active">Preguntas</li>
    </ol>
</section>