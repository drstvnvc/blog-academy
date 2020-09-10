@if($posts->previousPageUrl())
  <a href="{{$posts->previousPageUrl()}}">Prethodna strana</a>
@endif

Trenutna strana: {{$posts->currentPage()}}

@if($posts->nextPageUrl())
  <a href="{{$posts->nextPageUrl()}}">Sljedeća strana</a>
@endif
