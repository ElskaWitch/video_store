<x-main-layout :title="$video->title">
		<div class="container">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">{{ $video->title }}</h2>
				<div class="grid place-items-center">
						<img alt="{{ $video->title }}" class="rounded-xl w-96 " src="{{ asset('storage/' . $video->url_img) }}">
						<p class="text-center px-96 py-10">{!! nl2br(e($video->description)) !!}</p>
						@forelse ($video->list_actors as $actor)
								<p> {{ $actor->name }} </p>
						@empty
								<p>pas d'acteur pour cette video</p>
						@endforelse
						<p>{!! nl2br(e($video->nationality)) !!}</p>
						<p>{!! nl2br(e($video->year_created)) !!}</p>
						<p>{!! nl2br(e($video->actor)) !!}</p>
				</div>
				@auth
						<div class="pt-6 flex justify-center space-x-5">
								<div>
										<x-btn-delete :item="$video" routeItem="videos.destroy" />
								</div>
								<div>
										<a class="btn btn-success" href="{{ $video->id }}/edit">Modifier</a>
								</div>
						</div>
				@endauth
		</div>
</x-main-layout>
