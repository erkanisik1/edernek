@view('Assets/header')

@if(USERID)
	@view 
@else
	@view('Home/login')
@endif

@view('Assets/footer')
