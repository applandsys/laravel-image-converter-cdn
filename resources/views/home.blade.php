@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card shadow">
                        <div class="card-header text-center bg-primary text-white">
                            <h4>Convert Image to WebP</h4>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                    <br>
                                    <a href="{{ session('webp_url') }}" target="_blank">View WebP Image</a>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('convert.webp') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="image" class="form-label">Select JPG Image</label>
                                    <input class="form-control" type="file" name="image" id="image" accept=".jpg,.jpeg,.png" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Convert to WebP</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table  class="table">
                <tr>
                    <th>Image Link</th>
                    <th>Date</th>
                </tr>
                @foreach($imageList as $img)
                <tr>
                    <td>Image Link</td>
                    <td><a target="_blank" href="{{$url = url('/')}}/images/webp/{{$img->image_name}}">{{$url = url('/')}}/images/webp/{{$img->image_name}}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        {{-- Pagination links --}}
        <div>
            {{ $imageList->links() }}
        </div>
    </div>
</div>
@endsection
