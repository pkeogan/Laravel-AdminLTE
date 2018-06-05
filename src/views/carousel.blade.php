<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          @foreach($items as $item)
            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="@if($loop->first) active @endif"></li>
          @endforeach
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        
        @foreach($items as $item)
          <div class="item @if($loop->first) active @endif">
              <img src="{{ $item['img'] }}" alt="">
              <div class="carousel-caption">
                  <h1> {{ $item['title'] }}</h1>
                  <p>{{ $item['text'] }}</p>
              </div>
          </div>
        @endforeach
    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>