<x-guest-layout>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="manager" :value="__('Manager')" />
            {{-- <x-text-input id="manager" class="block mt-1 w-full" type="text" name="manager" :value="old('name')" required autofocus autocomplete="manager" /> --}}
            <x-text-input id="manager" class="typeahead form-control" type="text" name="manager"  autocomplete="off"/>
            <x-input-error :messages="$errors->get('manager')" class="mt-2" />
            <br>
            <input type="hidden" name="user_id" value="{{session('id')}}">
        </div>

       
      
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
    <script type="text/javascript">
        var path = "{{ url('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
</x-guest-layout>
