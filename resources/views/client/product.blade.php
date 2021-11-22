@extends('layouts.app1')
@section('contenu')

    <div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/f2.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span></p>
            <h1 class="mb-0 bread">{{$product->product_name}}</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    		
    		</div>
    		<div class="row justify-content-center">
    			
				<div class="col-md-6 col-lg-6 ftco-animate">
    				<div class="product">
    					<a href="{{url('/produitbyid/'.$product->id)}}" class="img-prod"><img height="350px" width="100%" class="img-responsive" src="/storage/product_images/{{$product->product_image}}" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$product->product_name}}</a></h3>
    						<div class="d-flex"> 
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">${{$product->product_price}}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="/ajouter_au_panier/{{$product->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
					
			
    		</div>

    	</div>
    </section>


    @endsection