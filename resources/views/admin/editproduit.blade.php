@extends('layouts.appadmin')
@section('title')
  Edit  Produit
@endsection
@section('contenu')
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit produit</h4>
                  @if (count($errors) >0)
                  <div class="alert alert-danger">
                     <ul>
                       @foreach ($errors->all() as $error)
                       
                       <li>{{$error}}</li>
                       @endforeach
                     </ul>
                     </div>
                  @endif 
                  @if (Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
</div>
                 @endif
                  <form class="cmxform" id="commentForm" method="post" action="{{url('/modifierproduit')}}" enctype="multipart/form-data">
        
                      {{csrf_field()}}
                    <fieldset>
                      <div class="form-group">
                        <label for="cname">Nom Produit</label>
                        <input id="cname" class="form-control" name="id" value="{{$product->id}}" minlength="2" type="hidden" >

                        <input id="cname" class="form-control" value="{{$product->product_name}}"  name="product_name" minlength="2" type="text" >
                      </div>
                      <div class="form-group">
                        <label for="cname">Prix du Produit</label>
                        <input id="cname" class="form-control" name="product_price" value="{{$product->product_price}}"  type="number" >
                      </div>
                      <div class="form-group">
                        {{Form::label('','Categorie du produit')}}
                        {{Form::select('product_category',$categories,$product->product_category,['class'=>'form-control'])}}
                        {{-- <label for="cname">Categorie du produit</label>
                        <Select class="form-control" name="product_category">
                         <option>Select Category</option>
                          @foreach($categories as $categorie)
                          <option >{{$categorie->category_name}}</option>
                          @endforeach
                        </Select> --}}
                      </div>
                      <div class="form-group">
                        <label for="cname">Image</label>
                        <input id="cname" class="form-control" name="product_image"  type="file" >
                      </div>

                      
                      <!-- <div class="form-group">
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" class="form-control" type="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="curl">URL (optional)</label>
                        <input id="curl" class="form-control" type="url" name="url">
                      </div>
                      <div class="form-group">
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                      </div> -->
                      <input class="btn btn-primary" type="submit" value="Modifier">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
</div>
</div>

@endsection
@section('scripts')
  <!-- <script src="backend/js/form-validation.js"></script>
  <script src="backend/js/bt-maxLength.js"></script> -->
@endsection