<x-main-layout title="Accueil">
		<div class="container">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">Video_store</h2>
				<div class="grid grid-cols-4 justify-items-center gap-7" id="container_card">
						@forelse ($videos as $video)
								<a class="card w-80 bg-base-100 shadow-xl py-7 rounded-xl" href="videos/{{ $video->id }}">
										<x-cards.CardVideo :description="$video->description" :title="$video->title" :url_img="$video->url_img" />
								</a>
						@empty
								<p class="text-xl text-[#0e0037]">Pas d'article actuellement</p>
						@endforelse
				</div>
				<div class="pt-10">
						{{-- {{ $posts->links('pagination::tailwind') }} --}}
				</div>
		</div>
</x-main-layout>
