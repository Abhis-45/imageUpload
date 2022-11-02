@extends('layouts.layout')
@section('content')
    <div class="container">

        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h3 class="text-info">Login here</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class='dash'>
                            <div class='error text-center'> You are not logged in </div>
                        </div>
                        <form method="post" action="{{ route('dologin') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    autofocus />
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endsection
    <script>
        $(function() {
            $(document).on("submit", "#handleAjax", function() {
                var element = this;
                $(this).find("[type='submit']").html("LOGIN...");

                $.post($(this).attr('action'), $(this).serialize(), function(data) {

                    $(element).find("[type='submit']").html("LOGIN");
                    if (data.status) {
                        window.location = data.redirect_location;
                    }
                }).fail(function(response) {

                    $(element).find("[type='submit']").html("LOGIN");
                    $(".alert").remove();
                    var erroJson = JSON.parse(response.responseText);
                    for (var err in erroJson) {
                        for (var errstr of erroJson[err])
                            $("#errors-list").append("<div class='alert alert-danger'>" + errstr +
                                "</div>");
                    }

                });
                return false;
            });
        });
    </script>
