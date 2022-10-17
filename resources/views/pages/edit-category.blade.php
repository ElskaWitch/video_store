<x-main-layout title="categories">
		<div class="px-20 py-12 ">
				<h1 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">modifier catégories</h1>
				<form action="{{ route('categories.update', $category->id) }}" method="POST">
						@csrf
            @method('PUT')
						<div class="px-96 space-y-5">
								{{-- name --}}
								<input class="block w-full rounded-xl border-gray-400" name="name" placeholder="Add category" type="text" value="{{old('name', $category->name)}}">
								<x-error-msg name="name" />
								{{-- envoyer --}}
								<div class="text-center">
										<button class="btn btn-primary" type="submit">Envoyer</button>
								</div>
						</div>
				</form>
		</div>
</x-main-layout>