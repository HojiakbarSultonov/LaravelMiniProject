<x-layouts.main>
    <x-slot:title>
        Post yaratish
    </x-slot:title>

    <x-pageHeader>
    Yangi Post yaratish
    </x-pageHeader>

    <div class="container">
        <div class="w-50 py-4">

            <div class="contact-form">
                <div id="success"></div>
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control p-4" name="title" placeholder="Sarlavha" value="{{old('title')}}"  data-validation-required-message="Please enter a subject" />
                      @error('title')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="control-group">
                        <input type="file" name="photo" class="form-control p-4" id="subject" placeholder="Rasm" required="required" data-validation-required-message="Please enter a subject" />
                        @error('photo')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="control-group">
                        <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Qisqacha"  >{{old('short_content')}}</textarea>
                        @error('short_content')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div> <div class="control-group">
                        <textarea class="form-control p-4" rows="6" name="content" placeholder="Maqola"  >{{old('content')}}</textarea>
                        @error('content')
                        <p class="help-block text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit" >Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>


    </div>

</x-layouts.main>
