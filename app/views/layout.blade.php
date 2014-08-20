<!DOCTYPE html>
<html lang="ja">
	@include('header')
	<body>
		@include('nav')
		<div class="content">
		<div class="container">
		@yield("content")
		</div>
		</div>
		@include('footer')
	</body>
</html>