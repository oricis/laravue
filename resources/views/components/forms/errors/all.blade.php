@if (session()->has('errors'))
    <div>
        <p class="warn cred top-2">
            {{ $errors->count() }}
            {{ ($errors->count()) > 1 ? 'errores' : 'error' }}
        </p>
        <ul class="bordered rounded pad-1 top-1 bottom-2 red-border">
            @foreach ($errors->all() as $error)
                <li class="cred">{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
