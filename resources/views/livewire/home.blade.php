
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @livewireStyles
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white"><h5 style="font-size: 23px;">Laravel Livewire - Login Register Example - Medikre.com</h5></div>

                    <div class="card-body">
                        @livewire('login-register')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</script>
</body>
</html>