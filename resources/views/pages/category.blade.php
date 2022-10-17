<x-main-layout title="categories">
		<div class="px-20 py-12 ">
				<h1 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">Gestion des catégories</h1>
				<form action="{{ route('categories.store') }}" method="POST">
						@csrf
						<div class="px-96 space-y-5">
								{{-- name --}}
								<input class="block w-full rounded-xl border-gray-400" name="name" placeholder="Add category" type="text">
								<x-error-msg name="name" />
								{{-- envoyer --}}
								<div class="text-center">
										<button class="btn btn-primary" type="submit">Envoyer</button>
								</div>
						</div>
				</form>
				@forelse ($categories as $category)
						<p class="text-center pt-5 text-lg font-semibold pb-2"> {{ $category->name }} </p>
						<div class="pb-6 flex justify-center space-x-5">
								<div>
										<a class="btn btn-success" href="{{ route('categories.edit', $category->id) }}">Modifier</a>
								</div>
								<div>
										<x-btn-delete :item="$category" routeItem="categories.destroy" />
								</div>
						</div>
				@empty
						<p class="text-xl text-[#0e0037]">Pas de categories actuellement</p>
				@endforelse
		</div>
</x-main-layout>
