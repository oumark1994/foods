@extends('layouts.app1')
@section('contenu')
    <!--start content-->    
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
			  @foreach ($sliders as $slider)
			  <div class="slider-item" style="background-image: url(/storage/slider_images/{{$slider->slider_image}});">
				<div class="overlay"></div>
			  <div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
  
				  <div class="col-md-12 ftco-animate text-center">
					<h2 class="mb-2" style="color: white">{{$slider->description1}}</h2>
					<h2 class="subheading mb-4">{{$slider->description2}}</h2>
					<p><a href="{{url('/shop')}}" class="btn btn-light">View Details</a></p>
				  </div>
  
				</div>
			  </div>
			</div>	  
			  @endforeach
	   
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Top Categories</h2>
          </div>
        </div>   		
    	</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
					
              @foreach ($categories  as  $category)
              <div class="col-md-3">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(/storage/category_images/{{$category->category_image}});">
									<div class="text px-3 py-1" style="background-color: #bd2130">
										<h2 class="mb-0"><a href="#">{{$category->category_name}}</a></h2>
									</div>
								</div>
								
							</div>
                  
              @endforeach
						
						</div>
					</div>

				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading text-white" style="background-color: #bd2130">Featured Foods</span>
            <h2 class="mb-4">Our Most Sold Foods</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				@foreach ($produits as $produit)
				<div class="col-md-6 col-lg-3 ftco-animate">
          
    				<div class="product">
    					<a  href="{{url('/produitbyid/'.$produit->id)}}" class="img-prod"><img class="img-responsive" height="350px" src="/storage/product_images/{{$produit->product_image}}" alt="Colorlib Template">
    						<span class="status" >30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$produit->product_name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">${{$produit->product_price}}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="/ajouter_au_panier/{{$produit->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
					
				@endforeach
    		
    			
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-section img" style="background-image: url(frontend/images/f1.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading" style="color: white">Best Price For You</span>
            <h2 class="mb-4"style="color: white" >Deal of the day</h2>
            <p style="color: white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <h3><a style="color: white" href="#">Spinach</a></h3>
            <span class="price" style="color: white">$10 <a href="#" style="color: white">now $5 only</a></span>
            <div id="timer" class="d-flex mt-5">
						  <div style="color: white" class="time" id="days"></div>
						  <div style="color: white" class="time pl-3" id="hours"></div>
						  <div  style="color: white" class="time pl-3" id="minutes"></div>
						  <div style="color: white" class="time pl-3" id="seconds"></div>
						</div>
          </div>
        </div>   		
    	</div>
    </section>
@endsection