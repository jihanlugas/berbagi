@extends('layouts.app')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h3>Register Berbagi Itu Indah</h3>
            <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <label for="nama">Nama</label>
                        <input type="text" class="validate @error('nama') invalid @enderror" id="nama" name="nama">
                        @error('nama')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <label for="email">Email</label>
                        <input type="email" class="validate @error('email') invalid @enderror" id="email" name="email">
                        @error('email')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <label for="nohp">No Hp</label>
                        <input type="text" class="validate @error('nohp') invalid @enderror" id="nohp" name="nohp">
                        @error('nohp')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <label for="alamat">Alamat</label>
                        <textarea class="materialize-textarea validate @error('alamat') invalid @enderror" id="alamat"
                                  name="alamat"></textarea>
                        @error('alamat')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="file-field input-field col s12 invalid">
                        <div class="btn">
                            <span>Photo 1</span>
                            <input type="file" name="photo_id_1">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        @error('photo_id_1')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="file-field input-field col s12 invalid">
                        <div class="btn">
                            <span>Photo 2</span>
                            <input type="file" name="photo_id_2">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        @error('photo_id_2')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="file-field input-field col s12 invalid">
                        <div class="btn">
                            <span>Photo 3</span>
                            <input type="file" name="photo_id_3">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        @error('photo_id_3')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="file-field input-field col s12 invalid">
                        <div class="btn">
                            <span>Photo 4</span>
                            <input type="file" name="photo_id_4">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        @error('photo_id_4')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="file-field input-field col s12 invalid">
                        <div class="btn">
                            <span>Photo 5</span>
                            <input type="file" name="photo_id_5">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        @error('photo_id_5')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
