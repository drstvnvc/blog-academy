<html>
  <body>
    <h2>Hey {{$user->name}}!!! Welcome to AcademyBlog</h2>
    <p>
      You are just one step away of enjoying our blog website.
    </p>
    <p>
      Please click the link bellow to verify your account:<br/>
      <a href="{{url('/account-verification/' . $user->id)}}">Verify account</a>
    </p>
  </body>
</html>
