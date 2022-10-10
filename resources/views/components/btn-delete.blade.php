@props(['video'])

<div class="">
		<form action="{{ route('videos.destroy', $video->id) }}" method="POST"
				onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce post ?')">
				@csrf
				@method('DELETE')
				<button class="btn btn-error">Supprimer</button>
		</form>
</div>
