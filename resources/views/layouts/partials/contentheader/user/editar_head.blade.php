<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', trans('gogamessage.Usuario') )
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('gogamessage.Usuario') }}</a></li>
        <li class="active">{{ trans('gogamessage.Editar') }}</li>
    </ol>
</section>