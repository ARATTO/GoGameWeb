@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Inicio') }}
@endsection


@section('main-content')
	@include('layouts.partials.contentheader.home_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Inicio') }}</div>

					<div class="panel-body">
						<!-- 16:9 aspect ratio -->
						
						<div class="embed-responsive embed-responsive-16by9">
							<iframe width="1280" height="720" src="https://www.youtube.com/embed/KA2Rl_cKicQ" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
