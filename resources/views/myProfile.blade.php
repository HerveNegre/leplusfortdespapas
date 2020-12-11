@extends('layouts.master')

@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">x</button>
                </div>
            @endif
            <div class="row">
                <div class="col md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Profile</h3>
                            <hr>
                            <form action="{{ route('myProfileUpdate') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col md-4">
                                    <div class="form-group">
                                        <b>Prénom</b>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col md-4">
                                    <div class="form-group">
                                        <b>Email</b>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col md-4">
                                    <div class="form-group">
                                        <button type="submit" class="form-control primary-btn">METTRE A JOUR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection