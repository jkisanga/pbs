@extends('action.layouts.error')
    
	@section('content')			
                <div class="row">
                   
					  <div class="col-md-12 text-center">
							<?php $messages = array('Sorry!', 'Oh no!', 'Whoops!'); ?>

							<h2>Server Error: 500 (Internal Server Error)</h2>

							<hr>

							<h3>What does this mean?</h3>

							<p>
								Something went wrong on our servers while we were processing your request.
								We're really sorry about this, and will work hard to get this resolved as
								soon as possible.
							</p>
						</div>
					</div>
			
  @stop