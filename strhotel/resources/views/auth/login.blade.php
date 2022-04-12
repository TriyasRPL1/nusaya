<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    
        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    
        <title>LaFonte | Home</title>
      </head>
<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
        <div class="col-md-8 col-lg-6 login-form">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4 text-center">Login</h3>
                        @if (session()->has('error'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-success">
                                            {{ session()->get('error') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
        
                        <!-- Sign In Form -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="mb-5">
                                <label for="email" class="mb-2">Email address</label>
                                <input type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="name@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password" class="mb-2">Password</label>
                                <input type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2 btn-login" type="submit">Sign in</button>
                            </div>
        
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        </div>
      </div>
</body>
</html>