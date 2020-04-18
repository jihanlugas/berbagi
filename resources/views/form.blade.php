@extends('layouts.app')

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ '/' }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input name="name" id="name" type="text" class="validate ">
                    <label for="name">Nama</label>
                </div>
                <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col right">
                    <button class="btn waves-effect waves-light" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>


            </div>
        </form>
    </div>

@endsection
