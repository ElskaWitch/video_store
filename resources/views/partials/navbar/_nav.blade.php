@php
$styleLink = 'bg-black px-3 py-1 rounded-xl hover:bg-blue-200 hover:text-black';
@endphp

<nav
		class="bg-gradient-to-r from-[#0e0037] via-[#6d5ba1] to-[#0e0037] text-white px-16 py-3 flex justify-between items-center">
		<a class="text-2xl" href="/" id="logo">Video_Store</a>
		<div class=" space-x-4 flex items-center" id="navitem">
				@guest
						<div class="{{ $styleLink }}">
								<a href=" {{ route('login') }} ">Connexion</a>
						</div>
						<div class="{{ $styleLink }}">
								<a href=" {{ route('register') }} ">Inscription</a>
						</div>
				@endguest
				@auth
						<div class=" space-x-4 flex items-center">
								<div class="{{ $styleLink }}">
										<a href="{{ route('dashboard') }}">Dashboard</a>
								</div>
								<x-btn-logout />
						</div>
				@endauth
		</div>
</nav>
