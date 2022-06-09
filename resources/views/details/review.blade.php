@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>REVIEWS</title>

	<link rel="stylesheet" href="{{ asset('css/review.css') }}">
</head>

<body id="div2">
	@if (\Session::has('mssg'))
	<div class="alert alert-success">
		<ul>
			<li>{!! \Session::get('mssg') !!}</li>
		</ul>
	</div>
	@endif
	@foreach ($productos as $item)

	<div class="imageArrow">
		<a href="{{ route('details.product',$item->id) }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
	</div>
	@if($puntuacion==0)
	<div class="container" style="text-align:center;">
		<h1 class="title"><b>Media de puntuación: 0</b> </h1>


		<svg id="stars" style="display: none;" version="1.1">
			<symbol id="stars-full-star" viewBox="0 0 102 18">
				<path d="M9.5 14.25l-5.584 2.936 1.066-6.218L.465 6.564l6.243-.907L9.5 0l2.792 5.657 6.243.907-4.517 4.404 1.066 6.218" />
			</symbol>

			<symbol id="stars-half-star" viewBox="0 0 102 18">
				<path d="M9.5 14.25l-5.584 2.936 1.066-6.218L.465 6.564l6.243-.907L9.5 0l2.792" fill="#97c7c7" />
			</symbol>

			<symbol id="stars-all-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-full-star" />
				<use xlink:href="#stars-full-star" transform="translate(21)" />
				<use xlink:href="#stars-full-star" transform="translate(42)" />
				<use xlink:href="#stars-full-star" transform="translate(63)" />
				<use xlink:href="#stars-full-star" transform="translate(84)" />
			</symbol>

			<symbol id="stars-0-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-all-star" fill="#9b9b9b" />
			</symbol>

			<symbol id="stars-0-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-0-0-star" />
				<use xlink:href="#stars-half-star" />
			</symbol>

			<symbol id="stars-1-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-0-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" />
			</symbol>

			<symbol id="stars-1-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-1-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(21)" />
			</symbol>

			<symbol id="stars-2-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-1-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(21)" />
			</symbol>

			<symbol id="stars-2-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-2-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(42)" />
			</symbol>

			<symbol id="stars-3-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-2-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(42)" />
			</symbol>

			<symbol id="stars-3-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-3-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(63)" />
			</symbol>

			<symbol id="stars-4-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-3-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(63)" />
			</symbol>

			<symbol id="stars-4-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-4-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(84)" />
			</symbol>

			<symbol id="stars-5-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-all-star" fill="#97c7c7" />
			</symbol>
		</svg>
		<symbol id="stars-0-0-star" viewBox="0 0 102 18">
			<use xlink:href="#stars-all-star" fill="#9b9b9b" />
		</symbol>
		<svg class="icon">
			<use xlink:href="#stars-0-0-star">
		</svg>
	</div>
	@else
	<div class="container" style="text-align:center;">
		@php ($result=($puntuacion/$count))

		@endphp
		<h1 class="title"><b>Media de puntuación: {{round($result,2)}}</b> </h1>

		<svg id="stars" style="display: none;" version="1.1">
			<symbol id="stars-full-star" viewBox="0 0 102 18">
				<path d="M9.5 14.25l-5.584 2.936 1.066-6.218L.465 6.564l6.243-.907L9.5 0l2.792 5.657 6.243.907-4.517 4.404 1.066 6.218" />
			</symbol>

			<symbol id="stars-half-star" viewBox="0 0 102 18">
				<path d="M9.5 14.25l-5.584 2.936 1.066-6.218L.465 6.564l6.243-.907L9.5 0l2.792" fill="#97c7c7" />
			</symbol>

			<symbol id="stars-all-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-full-star" />
				<use xlink:href="#stars-full-star" transform="translate(21)" />
				<use xlink:href="#stars-full-star" transform="translate(42)" />
				<use xlink:href="#stars-full-star" transform="translate(63)" />
				<use xlink:href="#stars-full-star" transform="translate(84)" />
			</symbol>

			<symbol id="stars-0-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-all-star" fill="#9b9b9b" />
			</symbol>

			<symbol id="stars-0-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-0-0-star" />
				<use xlink:href="#stars-half-star" />
			</symbol>

			<symbol id="stars-1-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-0-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" />
			</symbol>

			<symbol id="stars-1-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-1-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(21)" />
			</symbol>

			<symbol id="stars-2-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-1-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(21)" />
			</symbol>

			<symbol id="stars-2-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-2-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(42)" />
			</symbol>

			<symbol id="stars-3-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-2-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(42)" />
			</symbol>

			<symbol id="stars-3-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-3-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(63)" />
			</symbol>

			<symbol id="stars-4-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-3-0-star" />
				<use xlink:href="#stars-full-star" fill="#97c7c7" transform="translate(63)" />
			</symbol>

			<symbol id="stars-4-5-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-4-0-star" />
				<use xlink:href="#stars-half-star" transform="translate(84)" />
			</symbol>

			<symbol id="stars-5-0-star" viewBox="0 0 102 18">
				<use xlink:href="#stars-all-star" fill="#97c7c7" />
			</symbol>
		</svg>

		@if($result==0)
		No hay reviews
		@elseif($result>0 && $result <1) <svg class="icon">
			<use xlink:href="#stars-0-5-star">
				</svg>
				@elseif($result==1)
				<svg class="icon">
					<use xlink:href="#stars-1-0-star">
				</svg>
				@elseif($result>1 && $result <2) <svg class="icon">
					<use xlink:href="#stars-1-5-star">
						</svg>
						@elseif($result==2)
						<svg class="icon">
							<use xlink:href="#stars-2-0-star">
						</svg>

						@elseif($result>2 && $result <3) <svg class="icon">
							<use xlink:href="#stars-2-5-star">
								</svg>

								@elseif($result==3)
								<svg class="icon">
									<use xlink:href="#stars-3-0-star">
								</svg>

								@elseif($result>3 && $result <4) <svg class="icon">
									<use xlink:href="#stars-3-5-star">
										</svg>

										@elseif($result==4)
										<svg class="icon">
											<use xlink:href="#stars-4-0-star">
										</svg>
										@elseif($result>4 && $result <5) <svg class="icon">
											<use xlink:href="#stars-4-5-star">
												</svg>

												@elseif($result==5 )
												<svg class="icon">
													<use xlink:href="#stars-5-0-star">
												</svg>

												@endif
												@endif
	</div>

	<div class="container containerPrincipal">
		<div class="containerRow">
			<div class="col productDiv">

				<img src=" {{url('images/productimages/',$item->image1) }}" alt="" class="myimage">
				<h1 class="title">{{$item->name}}</h1>
				<h1 class="title" for="description"> <a href="{{ route('details.product',$item->id) }}" class="test">Detalles</a></h1>
				@if ($count === 1)
				<h1>{{$count}} Review</h1>
				@elseif ($count > 1)
				<h1>{{$count}} Reviews</h1>
				@else
				0 Reviews
				@endif
				@endforeach
			</div>

			<div class="col comentDiv">
				<table>
					@foreach ($reviews as $review)
					<tr>
						<td>
							<div class="stars"><img src="{{ asset('/images/user 2.svg.png ') }}" alt="" style="height:4rem">

								@if($review->puntuacion==0)

								<svg class="icon">
									<use xlink:href="#stars-0-0-star">
								</svg>
							</div>
							@elseif($review->puntuacion==1)
							<div class="stars">
								<svg class="icon">
									<use xlink:href="#stars-1-0-star">
								</svg>
							</div>
							@elseif($review->puntuacion==2)
							<div class="stars">
								<svg class="icon">
									<use xlink:href="#stars-2-0-star">
								</svg>
							</div>
							@elseif($review->puntuacion==3)
							<div class="stars">
								<svg class="icon">
									<use xlink:href="#stars-3-0-star">
								</svg>
							</div>
							@elseif($review->puntuacion==4)
							<div class="stars">
								<svg class="icon">
									<use xlink:href="#stars-4-0-star">
								</svg>
							</div>
							@else
							<div class="stars">
								<svg class="icon">
									<use xlink:href="#stars-5-0-star">
								</svg>
							</div>
						</td>
						@endif
					</tr>
					<tr>
						<td class="comentario">{{$review->comentario}}</td>
					</tr>
					@endforeach
				</table>
				@if(Auth::check() && $comp)
				<a class="btn addButton" href="{{ route('details.addreview',$id) }}">Añadir Review</a>
				@endif
				{{ $reviews->links() }}
			</div>
		</div>
	</div>

	<div class="text-center text-white footerHome">

		<div class="p-4">

			<section class="mb-4">

				<a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

				<a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


				<a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

			</section>
		</div>
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2021 Copyright:
			<a class="text-white divP" href="{{ asset('/') }}">Eco[Tòno]</a>
		</div>
	</div>
</body>

</html>