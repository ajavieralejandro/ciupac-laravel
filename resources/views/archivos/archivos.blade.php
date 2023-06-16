@extends('layouts.homelayout')
@section('content')


<div class="container w-screen mx-auto px-20 pb-10">


<div class="flex flex-col mt-8 py-9">
  
    <div class="py-9   -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            </th>
                      
                    
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach($articles as $article)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">
                              

                                <div class="ml-4">
                                    
                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                        <a href="{{$article->path}}">{{$article->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        

                    
               
                    </tr>
                    @endforeach
                 
                </tbody>
            </table>
        {{$articles->links()}}
        </div>
    </div>
</div>
@include('layouts.footerPage')

</div>
@endsection
