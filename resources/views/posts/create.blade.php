<x-guest-layout>

    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{route('posts.index')}}" class=" px-4 py-3 bg-indigo-300 hover:bg-indigo-600 rounded">
            Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class=" space-y-5" method="post" action="{{route('posts.store')}}">
                @csrf
                <div>
                    <label for="title" class=" text-xl">Title</label>
                    <input id="title " type="text" name="title" class=" block w-full py-3 mt-2 text-gray-800 
                    appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                    @error('title')
                    <span class="text-sm text-red-400  ">{{$message}}</span>
                        
                    @enderror
                    
                    
                    
                    </div>
                    <div>
                        <label for="body" class=" text-xl">Body</label>
                        <input id="body " type="text" name="body" class=" block w-full py-3 mt-2 text-gray-800 
                        appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                        @error('body')
                        <span class="text-sm text-red-400  ">{{$message}}</span>
                            
                        @enderror
                        
                        
                        
                        </div>
                    <button type="submit" class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600
                    font-medium text-white uppercase
                    focus:outline-none hover:shadow-none"> Create </button>
                </div>

</x-guest-layout>