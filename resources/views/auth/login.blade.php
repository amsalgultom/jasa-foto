@extends('layout-users.app')

@section('content')

<!-- Outer Row -->
<section class="mt-5 mb-5">
    <div class="container">

        <div class="card card-auth o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login ArtSpace Photoshoot</h1>
                            </div>
                            @if ($errors->has('validlogin'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('validlogin') }}
                            </div>
                            @endif
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control color-form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control color-form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" onclick="showPassword()"><span style="color: #a38f85;"> Show Password</span>
                                </div>
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary mt-2" value="Login">
                                <hr>
                            </form>
                            <div class="text-center">
                                <a href="/register">Create an Account!</a>
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

@push('scripts')
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush