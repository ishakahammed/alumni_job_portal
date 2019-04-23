@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', '| All conversations')

@section('content')

	
		<div class="col-8 offset-3">
			
			<h2 class=""> Conversations with <span class="text-primary"> Rana </span></h2>
			<br>

			<div class="row">
				<div class="col">
					<form>
                  		 <div class = "input-group">
            				<input name ="message" class = "form-control input-lg" type="text" placeholder="Write your messages">
			
				    		<span class = "input-group-append">
					  			<button class="btn btn-success input-lg" type="submit">Send</button>
				    		</span>
        				 </div> {{-- input-group--}}
            		</form>
				</div> {{--col  --}}
			</div> {{-- row --}}
			<br> <br>

			{{-- show chat --}}

			<div class="row">
				<div class="col-2">
					<p class="font-weight-bold"> Rana:</p>
				</div> {{-- col (show name of the person) --}}

				<div class="col-6">
					<p class="lead"> 
						Nice to hear it
					</p>
				</div> {{-- col--}}
				<div class="col-2">
					<p class="text-muted"> 
						17 seconds ago
					</p>
				</div> {{-- col--}}
			</div> {{-- row --}}

			<div class="row">
				<div class="col-2">
					<p class="font-weight-bold"> Akhter :</p>
				</div> {{-- col (show name of the person) --}}

				<div class="col-6">
					<p class="lead"> 
						Your company's salary is amazing 
					</p>
				</div> {{-- col--}}
				<div class="col-2">
					<p class="text-muted"> 
						3 days ago
					</p>
				</div> {{-- col--}}
			</div> {{-- row --}}

			<div class="row">
				<div class="col-2">
					<p class="font-weight-bold">Akhter :</p>
				</div> {{-- col (show name of the person) --}}

				<div class="col-6">
					<p class="lead"> 
					 I follow your job posts regularly
					</p>
				</div> {{-- col--}}
				<div class="col-2">
					<p class="text-muted"> 
						3 days ago
					</p>
				</div> {{-- col--}}
			</div> {{-- row --}}

			{{-- All chats --}}
		
		</div> <!-- col-->
	


@endsection