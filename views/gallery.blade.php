@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h3 class="text-center text-info">Profile here</h3>

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif

                        @if (Auth::check())
                            <table class="table table-striped table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    @foreach ($image as $image)
                                    <tr>
                                   <td>
                                       <img src="{{url('C:\xampp\htdocs\Admin\public\image').$data->image}}">
                                   </td>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
