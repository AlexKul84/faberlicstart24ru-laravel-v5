<div class="widget-first widget recent-posts">
  <h2>{{ Lang::get('ru.latest_project') }}</h2>
  <div class="recent-post group">
  	@if(!$catalogs->isEmpty())
  		@foreach($catalogs as $catalog)
  			<div class="hentry-post group">
          <div class="thumb-img">
            <a href="{{ $catalog->link }}" onclick="ym(69596722,'reachGoal','CATALOGLINK'); return true;"><img src="{{ asset(env('THEME')) }}/images/projects/{{ $catalog->img->max }}" alt="{{ $catalog->alt }}" title="Фото каталага" /></a>
          </div>
          <div class="text">
              <a href="{{ $catalog->link }}" onclick="ym(69596722,'reachGoal','CATALOGLINK'); return true;" title="{{ $catalog->title }}" class="title">{{ $catalog->title }}</a>
          </div>
        </div>
  		@endforeach
  	@endif
  </div>
</div>
