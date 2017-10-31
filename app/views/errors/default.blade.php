@extends('action.layouts.error')
    
	@section('content')			
                <div class="row">
                   
					  <div class="col-md-12 text-center">
			
			<h1>Sorry</h1>

			<h2>Problem Occured</h2>

			<hr>


			<p>
				We're really sorry
				about that.Please contact the systen administrator.
			</p>

			<p>
				Perhaps you would like to go to our <a href="{{{ URL::to('/') }}}">home page</a>?
			</p>
		</div>
	</div>
@stop
