@extends('layouts.appadmin')
@section('title')
Categories
@endsection
@section('contenu')
<div class="main-panel">
        <div class="content-wrapper">

          {{Form::hidden('',$increment=1)}}

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sliders </h4>
              <h4 class="card-title">Produits </h4>
              @if (Session::has('status'))
              <div class="alert alert-success">
                {{Session::get('status')}}
</div>
             @endif
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <td>Order #</td>
                          <th>Image</th>
                            <th>Description1</th>
                            <th>Description2</th>
                            <th>Status</th>
                            <th>Actions</th>
                    
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                          <td>{{$increment}}</td>
                          <td><img src="/storage/slider_images/{{$slider->slider_image}}"/></td>
                          <td>{{$slider->description1}}</td>
                          <td>{{$slider->description2}}</td>
                           
                            
                          <td>
                            @if ($slider->status==1)
                            <label class="badge badge-success">Active</label>                      
                            @else
                            <label class="badge badge-danger">Desactive</label>
                            @endif
                          </td>
                          <td>
                          <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_slider/'.$slider->id)}}'">Edit</button>
                          <a class="btn btn-outline-danger" id="delete" href="{{url('/supprimerslider/'.$slider->id)}}">Delete</a>
                          @if ($slider->status ==1)
                          <button class="btn btn-outline-warning" onclick="window.location='{{url('/desactiver_slider/'.$slider->id)}}'">Desactive</button>    
                          @else
                          <button class="btn btn-outline-success" onclick="window.location='{{url('/activer_slider/'.$slider->id)}}'">Activer</button>
                              
                          @endif
                          </td>
                        </tr>
                        {{Form::hidden('',$increment=$increment + 1)}}
                        @endforeach
    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
</div>
@endsection
@section('scripts')
<script src="backend/js/data-table.js"></script>
@endsection