<hr>

<p class="text-center">
	&copy; ModelAWiki 2018 - All Rights Reserved
	<br>
	<a href="{{ route('pages.terms') }}">Terms of Service</a> | <a href="{{ route('pages.privacy') }}">Privacy Policy</a>
</p>

@auth('admin')
	<p class="text-center">
		<a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
	</p>
@endauth