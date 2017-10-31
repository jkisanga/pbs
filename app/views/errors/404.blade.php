@extends('action.layouts.error')
    
	@section('content')			
                <div class="row">
                   
					  <div class="col-md-12 text-center">
						<?php $messages = array('I think you are lost!'); ?>

						<h1><?php echo $messages[mt_rand(0, 2)]; ?></h1>

						<h2>Server Error: 404 (Not Found)</h2>

						<hr>

						<h3>What does this mean?</h3>

						<p>
							We couldn't find the page you requested on our servers. We're really sorry
							about that. It's our fault, not yours. We'll work hard to get this page
							back online as soon as possible.
						</p>

						<p>
							Perhaps you would like to go to our <a href="{{{ URL::to('/') }}}">home page</a>?
						</p>
		</div>
	</div>
@stop
