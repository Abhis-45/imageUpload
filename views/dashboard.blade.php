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
                        <form method="post" action="{{ route('upload.image') }}">
                            <table class="table table-striped table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-success">Name </th>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-success">Email </th>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="text-center text-info">Upload image</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><select name="select" id="select" class="form-control">
                                                <option value="">select image to upload</option>
                                                <option value="0">portrait image</option>
                                                <option value="1">Landscape image</option>
                                            </select>
                                        </td>
                                        <td><input type="file" name="img" id="img" class="form-control">
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
