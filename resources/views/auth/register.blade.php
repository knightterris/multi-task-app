<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('globalText.register.title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="" style="margin-top:5%;">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-center p-3">{{ trans('globalText.register.header') }}</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <label for="name" class="form-label">{{ trans('globalText.register.name') }}</label>
                            <input type="text" name="name" id="" class="form-control my-2" placeholder="{{ trans('globalText.placeholders.enter_name') }}">

                            <label for="email" class="form-label">{{ trans('globalText.register.email') }}</label>
                            <input type="text" name="email" id="" class="form-control my-2" placeholder="{{ trans('globalText.placeholders.enter_email') }}">

                            <label for="passowrd" class="form-label">{{ trans('globalText.register.password') }}</label>
                            <input type="password" name="password" id="" class="form-control my-2" placeholder="{{ trans('globalText.placeholders.enter_password') }}">

                            <label for="passowrd" class="form-label">{{ trans('globalText.register.password') }}</label>
                            <input type="password" name="password_confirmation" id="" class="form-control my-2" placeholder="{{ trans('globalText.placeholders.enter_password') }}">

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">{{ trans('globalText.register.button_text') }}</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <span class="me-2">{{ trans('globalText.register.has_account') }}</span><a href="{{ route('auth.loginPage') }}">{{ trans('globalText.register.login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
