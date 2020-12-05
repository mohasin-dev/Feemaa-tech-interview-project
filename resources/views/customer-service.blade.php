@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-header">Add Customer services</div>
                @foreach($services as $service)
                <div class="card-body">
                    <h5>{{  $service->name }}</h5><hr>
                    <form  action="{{ route('customer.service.store', $customer->id) }}" method="POST">
                        @csrf
                        @foreach($service->serviceMetas as $serviceMeta)
                        <div class="form-group">  
                            <label>{{ $serviceMeta->name }}</label>
                            <input type="text" name="{{ $serviceMeta->id }}"  class="form-control">
                        </div>
                        @endforeach
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
