<x-main-layout title="Create">
		<div class="container">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">New Post</h2>
				<form action="{{ route('videos.store') }}" enctype="multipart/form-data" method="POST">
						@csrf
						<div class="px-96 space-y-5">
								{{-- title --}}
								<input class="block w-full rounded-xl border-gray-400" name="title" placeholder="Titre du post" type="text"
										value="{{ old('title') }}">
								<x-error-msg name="title" />
								{{-- description --}}
								<textarea class="mt-5 block w-full rounded-xl border-gray-400" cols="30" id="" name="description"
								  placeholder="Votre contenu..." rows="10">{{ old('description') }}</textarea>
								<x-error-msg name="description" />
								{{-- nationality --}}
								<input class="block w-full rounded-xl border-gray-400" name="nationality" placeholder="nationality"
										type="text" value="{{ old('nationality') }}">
								<x-error-msg name="nationality" />
								{{-- year --}}
								<input class="block w-full rounded-xl border-gray-400" name="year_created" placeholder="year created"
										type="text" value="{{ old('year_created') }}">
								<x-error-msg name="year_created" />
								{{-- actor --}}
								<input class="block w-full rounded-xl border-gray-400" name="actor" placeholder="actor" type="text"
										value="{{ old('actor') }}">
								<x-error-msg name="actor" />
								{{-- img --}}
								<div class="py-3">
										<label for="">Choisir une image:</label>
										<input class="block" id="" name="url_img" type="file">
										<x-error-msg name="url_img" />
								</div>
								{{-- envoyer --}}
								<div class="text-center">
										<button class="btn btn-primary" type="submit">Envoyer</button>
								</div>
						</div>
				</form>
		</div>
</x-main-layout>
