@extends('layouts.layout')
@section('content')
    <div class="container">

        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h3 class="text-info">Registration here</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('doregister') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    autofocus />
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" />
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" />
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">REGISTER</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endsection
    <script>
        $(function() {

            $(document).on("submit", "#handleRegisterAjax", function() {
                var element = this;

                $(this).find("[type='submit']").html("REGISTER...");
                $.post($(this).attr('action'), $(this).serialize(), function(data) {

                    $(element).find("[type='submit']").html("REGISTER");
                    if (data.status) {
                        alert(data.msg)
                        window.location = data.redirect_location;
                    }


                }).fail(function(response) {

                    $(element).find("[type='submit']").html("LOGIN");
                    $(".alert").remove();
                    var erroJson = JSON.parse(response.responseText);
                    for (var err in erroJson) {
                        for (var errstr of erroJson[err])
                            $("[name='" + err + "']").after("<div class='alert alert-danger'>" +
                                errstr + "</div>");
                    }

                });
                return false;
            });

        });
    </script>
