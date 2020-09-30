@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600"> Upss! ada yang salah nihh.</div>
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <ul class="mb-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </div>
    </div>
@endif
