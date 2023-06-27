@extends('layout-users.app')

@section('content')

<!-- Outer Row -->
<section class="mt-5 mb-5">
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login ArtSpace Photoshoot</h1>
                        </div>
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                                <hr>
                            </form>
                            <div class="text-center">
                                <a  href="/register">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</section>
@endsection