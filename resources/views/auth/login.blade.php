@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="glass-morphism-card text-center">
                <h2 class="mb-4">Hi, Welcome back</h2>
                <form>
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email address" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-success w-100">LOGIN</button>
                    <p class="mt-3">Don't have account? <a href="#">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection