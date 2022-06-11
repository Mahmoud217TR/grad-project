@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="card my-5">
        <div class="card-body bg-dark">
            <div class="row">
                <div class="col">
                    <p class="base-line">
                        <a href="" class="text-light d-flex unstyled-anchor1">Name</a>
                    </p>
                    <div class="row row-cols-auto orange-text">
                        <div class="">
                            <i class="bi bi-calendar3 px-1"></i>
                        </div>
                         <div class="">
                            <p>2 days, 8 hours</p> 
                         </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end dropstart">
                    <a class="orange-text unstyled-anchor base-line" type="button" 
                        data-bs-toggle="dropdown" id="#ff"
                        aria-expanded="false">

                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col col-md-6 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="ff">
                        <ul class="m-3 list-unstyled">
                            <li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-save2 mx-1"></i> Save</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <p class="base-line">
                <h5>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                   Aliquam in felis sit amet augue.
                </h5>
            </p>
        </div>
		{{----}}
        <div class="card-body">

			
            <div class="row row-cols-auto text-dark">
                {{--number of comments--}}
                   <div class="col mt-4 d-flex">
                        <a class="d-flex unstyled-anchor1 text-dark" href="">
                            <h3 class="mt-4 mx-3"><i class="bi bi-chat-left-fill px-1"></i></h3>
                            <div class="mt-4 mx-2">
                               <h3><p>2 comments</p></h3> 
                            </div>
                        </a>
                    </div>
                {{--end number of comments--}}
                {{----}}
                    <div class="col offset-md-2 offset-lg-4 offset-xl-6  mt-4 d-flex">
                        {{----}}    
                        <div class="d-flex">
                            {{--<a class="bi bi-heart-fill unstyled-anchor1"></a>--}}
                            <h3 class="mt-4 mx-3">
                                <dislike-component></dislike-component>
                            </h3>
                            {{--بعد الضغط عليه يتحول إلى الشكل التالي--}}
                            {{--
                                    <i class="bi bi-heart-fill"></i>
                            --}}
                             <div class="mt-4 mx-2">
                                <h3><p>2 dislikes</p></h3> 
                            </div>
                    
                        </div>
                        {{----}}
                        {{--<a class="bi bi-heart-fill unstyled-anchor1"></a>--}}
                        <h3 class="mt-4 mx-3">
                            <like-component></like-component>
                        </h3>
                        {{--بعد الضغط عليه يتحول إلى الشكل التالي--}}
                        {{--
                            <i class="bi bi-heart-fill"></i>
                            --}}
                        <div class="mt-4 mx-2">
                            <h3><p>2 likes</p></h3> 
                        </div>
                        
                    </div>
                {{----}}

            {{----}}
            </div>    
        </div>
		{{--end --}}
    </div>
    <div class="card my-5">
        <div class="card-body bg-dark">
            <div class="row">
                <div class="col">
                    <p class="base-line">
                        <a href="" class="text-light unstyled-anchor1 d-flex">Name</a>
                    </p>
                    <div class="row row-cols-auto orange-text">
                        <div class="">
                            <i class="bi bi-calendar3 px-1"></i>
                        </div>
                         <div class="">
                            <p>2 days, 8 hours</p> 
                         </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end dropstart">
                    <a class="orange-text unstyled-anchor base-line" type="button" 
                        data-bs-toggle="dropdown" id="#ff"
                        aria-expanded="false">

                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col col-md-6 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="ff">
                        <ul class="m-3 list-unstyled">
                            <li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-save2 mx-1"></i> Save</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <p class="base-line">
                <h5>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                  dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                   Aliquam in felis sit amet augue.
                </h5>
            </p>
        </div>
		{{----}}
        <div class="card-body">

			
            <div class="row row-cols-auto text-dark">
                {{--number of comments--}}
                <a class="d-flex unstyled-anchor1 text-dark" href="">
                    <div class="col mt-4 d-flex">
                        <h3 class="mt-4 mx-3"><i class="bi bi-chat-left-fill px-1"></i></h3>
                        <div class="mt-4 mx-2">
                            <h3><p>2 comments</p></h3> 
                        </div>
                    </div>

                </a>
                {{--end number of comments--}}
                {{----}}
                <div class="col offset-md-2 offset-lg-4 offset-xl-6  mt-4 d-flex">
                    {{----}}    
                    <div class="d-flex">
                        {{--<a class="bi bi-heart-fill unstyled-anchor1"></a>--}}
                        <h3 class="mt-4 mx-3">
                            <dislike-component></dislike-component>
                        </h3>
                        {{--بعد الضغط عليه يتحول إلى الشكل التالي--}}
                        {{--
                                <i class="bi bi-heart-fill"></i>
                        --}}
                         <div class="mt-4 mx-2">
                            <h3><p>2 dislikes</p></h3> 
                        </div>
                
                    </div>
                    {{----}}
                    {{--<a class="bi bi-heart-fill unstyled-anchor1"></a>--}}
                    <h3 class="mt-4 mx-3">
                        <like-component></like-component>
                    </h3>
                    {{--بعد الضغط عليه يتحول إلى الشكل التالي--}}
                    {{--
                        <i class="bi bi-heart-fill"></i>
                        --}}
                    <div class="mt-4 mx-2">
                        <h3><p>2 likes</p></h3> 
                    </div>
                    
                </div>
                {{----}}
            </div>    
        </div>
		{{--end --}}
    </div>
</div>
@endsection
