@extends('layouts.app')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT - Edit Kontak</h1>
            <form action="{{ route('kontak.update', $data->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="input-field">
                        <label for="nama">Nama</label>
                        @error('nama')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                        <input type="text" class="validate @error('nama') invalid @enderror" id="nama" name="nama"
                               value="{{ $data->nama }}">
                    </div>
                    <div class="input-field">
                        <label for="email">Email</label>
                        @error('email')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                        <input type="email" class="validate @error('email') invalid @enderror" id="email" name="email"
                               value="{{ $data->email }}">
                    </div>
                    <div class="input-field">
                        <label for="nohp">No Hp</label>
                        @error('nohp')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                        <input type="text" class="validate @error('nohp') invalid @enderror" id="nohp" name="nohp"
                               value="{{ $data->nohp }}">
                    </div>
                    <div class="input-field">
                        <label for="alamat">Alamat</label>
                        <textarea class="validate materialize-textarea @error('alamat') invalid @enderror" id="alamat"
                                  name="alamat">{{ $data->alamat }}</textarea>
                        @error('alamat')
                        <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field">
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
