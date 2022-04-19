@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-body bg-dark">
            <div class="row">
                <div class="col">
                    <p class="base-line">
                        Name
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
                    <a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
                        data-bs-toggle="dropdown" id="#ff"
                        aria-expanded="false">

                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col col-md-6 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="ff">
                        <ul class="m-3 list-unstyled">
                            <li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-save2 mx-1"></i> Save</li>
                            <li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
                            <li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
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
		{{--comment--}}
        <div class="card-body">

			{{--number of comments--}}
            <div class="row row-cols-auto text-dark">
                <div class="mt-4">
                    <h3><i class="bi bi-chat-left-fill px-1"></i></h3>
                </div>
                 <div class="mt-4">
                    <h3><p>2 comments</p></h3> 
                 </div>
            </div>
			{{--end number of comments--}}

			{{--box write comment--}}
            <div class="col-lg-8 ps-2 my-2">
                <form method="POST" action="">
                    <div class="row row-cols-auto">
                        <div class="col-12 col-sm-7 form-floating">
                            <textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea"><p class="text-dark">Comments</p></label>
                           </div>
                           <div class="col-12 col-sm-5">
                            <button type="submit" class="btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
                            <button class="btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
                           </div>
                    </div>
                </form>
			</div>
		   	{{--end box write comment--}}

			{{--يتم معاملة المقطع التالي ك جزء كامل من اجل انشاء مكون يمثل صندوق الرد على التعليقات في ال
				vue.js 
				 للتوضيح نضع المقطع التالي كله كمحتوى ضمن 
				 reply ----> reply box comment ----> comments
				 فينتج لدينا تعليقات وردودها 
				--}}

			{{--other comment--}}
			<div class="mx-3 border-start border-2 border-secondary">
				<div class="d-flex justify-content-start row mt-4">
					<div class="d-flex">
						{{--hr--}}
						<div class="col-1 py-4">
							<hr class="reply-list">
						</div>
						{{--end hr--}}

						{{--content comment--}}
						<div class="col-10 p-3 border-bottom">
							{{--name person--}}
							<div class="d-flex">
								<img class="rounded-circle" src="{{ asset('images/background.jpg') }}" width="60" height="60">
								<div class="d-flex flex-column ms-3">
									<p class="orange-text base-line">Name</p>
									<p class="text-secondary">2 days, 8 hours</p> 
								</div>
							</div>
							{{--end name person--}}

							{{--comment person--}}
							<div class="mt-2">
								<h6 class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
							</div>
							{{--end comment person--}}

							{{--reply--}}
							<div class="mt-2">
								<div class="col justify-content-start">
									<a href="/pp" class="orange-text unstyled-anchor1 TB" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-controls="collapseExample"
                                            aria-expanded="false">
                                            <i class="bi bi-reply"></i>
                                            reply
									</a>
									{{--reply box comment--}}
									<div class="mx-2 text-dark collapse" id="collapseExample">

										{{--comments--}}
                                            			{{--other comment--}}
			<div class="mx-3 border-start border-2 border-secondary">
				<div class="d-flex justify-content-start row mt-4">
					<div class="d-flex">
						{{--hr--}}
						<div class="col-1 py-4">
							<hr class="reply-list">
						</div>
						{{--end hr--}}

						{{--content comment--}}
						<div class="col-10 p-3 border-bottom">
							{{--name person--}}
							<div class="d-flex">
								<img class="rounded-circle" src="{{ asset('images/background.jpg') }}" width="60" height="60">
								<div class="d-flex flex-column ms-3">
									<p class="orange-text base-line">Name</p>
									<p class="text-secondary">2 days, 8 hours</p> 
								</div>
							</div>
							{{--end name person--}}

							{{--comment person--}}
							<div class="mt-2">
								<h6 class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
							</div>
							{{--end comment person--}}

							{{--reply--}}
							<div class="mt-2">
								<div class="col justify-content-start">
									<a href="/pp" class="orange-text unstyled-anchor1 TB" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-controls="collapseExample1"
                                            aria-expanded="false">
                                            <i class="bi bi-reply"></i>
                                            reply
									</a>
									{{--reply box comment--}}
									<div class="mx-2 text-dark collapse" id="collapseExample1">

										{{--comments--}}
														{{--other comment--}}
			<div class="mx-3 border-start border-2 border-secondary">
				<div class="d-flex justify-content-start row mt-4">
					<div class="d-flex">
						{{--hr--}}
						<div class="col-1 py-4">
							<hr class="reply-list">
						</div>
						{{--end hr--}}

						{{--content comment--}}
						<div class="col-10 p-3 border-bottom">
							{{--name person--}}
							<div class="d-flex">
								<img class="rounded-circle" src="{{ asset('images/background.jpg') }}" width="60" height="60">
								<div class="d-flex flex-column ms-3">
									<p class="orange-text base-line">Name</p>
									<p class="text-secondary">2 days, 8 hours</p> 
								</div>
							</div>
							{{--end name person--}}

							{{--comment person--}}
							<div class="mt-2">
								<h6 class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
							</div>
							{{--end comment person--}}

							{{--reply--}}
							<div class="mt-2">
								<div class="col justify-content-start">
									<a href="/pp" class="orange-text unstyled-anchor1 TB" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-controls="collapseExample3"
                                            aria-expanded="false">
                                            <i class="bi bi-reply"></i>
                                            reply
									</a>
									{{--reply box comment--}}
									<div class="mx-2 text-dark collapse" id="collapseExample3">

										{{--comments--}}
											
										{{--commens--}}
										
										{{--box write comment--}}
										<div class="col-lg-8 ps-2 my-2">
											<form method="POST" action="">
												<div class="row row-cols-auto">
													<div class="col-12 col-sm-7 form-floating">
														<textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
														<label for="floatingTextarea"><p class="text-dark">Comments</p></label>
													</div>
													<div class="col-12 col-sm-5">
														<button type="submit" class="btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
														<button class="btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
													</div>
												</div>
											</form>
										</div>
										{{--end box write comment--}}

									</div>
									{{--end reply box comment--}}
								</div>
							</div>
							{{--end reply--}}

						</div>
						{{--end content comment--}}

						{{--اذا كان صاحب التعليق بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
							<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

						{{--اذا كان صاحب البوست بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
								<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

					</div>
				</div>
			</div>
			{{--end other comment--}}
										{{--commens--}}
										
										{{--box write comment--}}
										<div class="col-lg-8 ps-2 my-2">
											<form method="POST" action="">
												<div class="row row-cols-auto">
													<div class="col-12 col-sm-7 form-floating">
														<textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
														<label for="floatingTextarea"><p class="text-dark">Comments</p></label>
													</div>
													<div class="col-12 col-sm-5">
														<button type="submit" class="btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
														<button class="btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
													</div>
												</div>
											</form>
										</div>
										{{--end box write comment--}}

									</div>
									{{--end reply box comment--}}
								</div>
							</div>
							{{--end reply--}}

						</div>
						{{--end content comment--}}

						{{--اذا كان صاحب التعليق بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
							<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

						{{--اذا كان صاحب البوست بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
								<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

					</div>
				</div>
			</div>
			{{--end other comment--}}	
            
            			{{--other comment--}}
			<div class="mx-3 border-start border-2 border-secondary">
				<div class="d-flex justify-content-start row mt-4">
					<div class="d-flex">
						{{--hr--}}
						<div class="col-1 py-4">
							<hr class="reply-list">
						</div>
						{{--end hr--}}

						{{--content comment--}}
						<div class="col-10 p-3 border-bottom">
							{{--name person--}}
							<div class="d-flex">
								<img class="rounded-circle" src="{{ asset('images/background.jpg') }}" width="60" height="60">
								<div class="d-flex flex-column ms-3">
									<p class="orange-text base-line">Name</p>
									<p class="text-secondary">2 days, 8 hours</p> 
								</div>
							</div>
							{{--end name person--}}

							{{--comment person--}}
							<div class="mt-2">
								<h6 class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
							</div>
							{{--end comment person--}}

							{{--reply--}}
							<div class="mt-2">
								<div class="col justify-content-start">
									<a href="/pp" class="orange-text unstyled-anchor1 TB" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-controls="collapseExample2"
                                            aria-expanded="false">
                                            <i class="bi bi-reply"></i>
                                            reply
									</a>
									{{--reply box comment--}}
									<div class="mx-2 text-dark collapse" id="collapseExample2">

										{{--comments--}}
											
										{{--commens--}}
										
										{{--box write comment--}}
										<div class="col-lg-8 ps-2 my-2">
											<form method="POST" action="">
												<div class="row row-cols-auto">
													<div class="col-12 col-sm-7 form-floating">
														<textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
														<label for="floatingTextarea"><p class="text-dark">Comments</p></label>
													</div>
													<div class="col-12 col-sm-5">
														<button type="submit" class="btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
														<button class="btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
													</div>
												</div>
											</form>
										</div>
										{{--end box write comment--}}

									</div>
									{{--end reply box comment--}}
								</div>
							</div>
							{{--end reply--}}

						</div>
						{{--end content comment--}}

						{{--اذا كان صاحب التعليق بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
							<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

						{{--اذا كان صاحب البوست بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
								<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

					</div>
				</div>
			</div>
			{{--end other comment--}}
										{{--commens--}}
										
										{{--box write comment--}}
										<div class="col-lg-8 ps-2 my-2">
											<form method="POST" action="">
												<div class="row row-cols-auto">
													<div class="col-12 col-sm-7 form-floating">
														<textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
														<label for="floatingTextarea"><p class="text-dark">Comments</p></label>
													</div>
													<div class="col-12 col-sm-5">
														<button type="submit" class="btn button-primary btn-sm shadow-none me-2" type="button">Post comment</button>
														<button class="btn btn-outline-danger btn-sm shadow-none" type="button">Cancel</button>
													</div>
												</div>
											</form>
										</div>
										{{--end box write comment--}}

									</div>
									{{--end reply box comment--}}
								</div>
							</div>
							{{--end reply--}}

						</div>
						{{--end content comment--}}

						{{--اذا كان صاحب التعليق بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
							<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

						{{--اذا كان صاحب البوست بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a href="/pp" class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
								<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

					</div>
				</div>
			</div>
			{{--end other comment--}}
			
        </div>
		{{--end comment--}}
    </div>
</div>
@endsection