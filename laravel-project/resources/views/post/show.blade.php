@extends('layouts.app')
@section('title','Show Posts')
@section('content')
<div class="container pt-3">
      <div class="card bg-dark my-5">
          <div class="card-body">
                <div class="card-header bg-dark bottom-line">
                    <p class="head-line">
                        Title-post
                    </p>
                </div>
                <div class="card-body">
                    <p class="base-line">
                        By Name
                    </p>
                    <p class="base-line">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                          dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                           Aliquam in felis sit amet augue.
                    </p>
                    <div class="row flex">
                        <div class="col-md-9 align-items-md-start">
                            <ul class="list-group list-group-horizontal list-unstyled">
                                <li class="py-2">
                                    <div class="row row-cols-auto text-center">
                                        <div class="col-md-2">
                                            <i class="bi bi-calendar3 px-1"></i>
                                        </div>
                                         <div class="col-md-9">
                                            <p>2 days, 8 hours</p> 
                                         </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="row row-cols-auto text-center">
                                        <div class="col-md-2">
                                            <i class="bi bi-chat-left-fill px-1"></i>
                                        </div>
                                         <div class="col-md-9">
                                            <p>2 comments</p> 
                                         </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 align-items-md-end py-3">
                            <h6><a href="/post-page" class="orange-text unstyled-anchor TB mx-2" type="button">Read More <i class="bi bi-chevron-double-right"></i></a></h6>
                        </div>
                    </div>
                </div>
        </div>
      </div>
      <div class="card bg-dark my-5">
        <div class="card-body">
              <div class="card-header bg-dark bottom-line">
                  <p class="head-line">
                      Title-post
                  </p>
              </div>
              <div class="card-body">
                  <p class="base-line">
                      By Name
                  </p>
                  <p class="base-line">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                      Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                         Aliquam in felis sit amet augue.
                  </p>
                  <div class="row flex">
                      <div class="col-md-9 align-items-md-start">
                          <ul class="list-group list-group-horizontal list-unstyled">
                              <li class="py-2">
                                  <div class="row row-cols text-center">
                                      <div class="col-md-2">
                                          <i class="bi bi-calendar3 px-1"></i>
                                      </div>
                                       <div class="col-md-9">
                                          <p>2 days, 8 hours</p> 
                                       </div>
                                  </div>
                              </li>
                              <li class="py-2">
                                  <div class="row row-cols text-center">
                                      <div class="col-md-2">
                                          <i class="bi bi-chat-left-fill px-1"></i>
                                      </div>
                                       <div class="col-md-9">
                                          <p>2 comments</p> 
                                       </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                      <div class="col-md-3 align-items-md-end py-3">
                          <h6><a href="post-page" class="orange-text unstyled-anchor TB mx-2" type="button">Read More <i class="bi bi-chevron-double-right"></i></a></h6>
                      </div>
                  </div>
              </div>
      </div>
    </div>
</div>
@endsection