<div class="widget-first widget contact-info">
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
	@if($articles)
		<h2>{{trans('ru.from_blog')}}</h2>
		<div class="recent-post group">
			@foreach($articles as $article)
				<div class="hentry-post group">
					<div class="thumb-img">
						<a href="{{ route('articles.show',['alias'=>$article->alias]) }}"><img src="{{asset(env('THEME'))}}/images/articles/{{ $article->img->max }}" alt="{{ $article->alt_img }}" title="{{ $article->title_img }}" /></a>
					</div>
					<div class="text">
						<a href="{{ route('articles.show',['alias'=>$article->alias]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title_article }}</a>
						<p class="post-date">{{ $article->created_at->format('F d, Y') }}</p>
					</div>
				</div>
			@endforeach
		</div>
	@endif
</div>
