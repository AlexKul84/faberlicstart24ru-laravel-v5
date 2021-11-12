<div class="section portfolio">
	<h2 class="title">{{trans('ru.from_blog')}}</h2>
		@if($articles)
			<ul id="portfolio" class="three-columns">
				@foreach($articles as $article)
					<li class="one-third">
						<div class="overlay_a">
							<div class="overlay_wrapper">
								<img src="{{asset(env('THEME'))}}/images/articles/{{ $article->img->max }}" alt="{{ $article->alt_img }}" title="{{ $article->title_img }}" />
								<div class="overlay">
									<a class="overlay_project" href="{{ route('articles.show',['alias'=>$article->alias]) }}"></a>
								</div>
							</div>
						</div>
						<p><a href="{{ route('articles.show',['alias'=>$article->alias]) }}" >{{ $article->title_article }}</a></p>
						<p class="post-date">{{ $article->created_at->format('F d, Y') }}</p>
						<p>{{ $article->desc }}</p>
					</li>
				@endforeach
			</ul>
			<div class="clear"></div>
			<p class="btn-reg"><a href="{{ asset(env('REGISTER')) }}" onclick="ym(69596722,'reachGoal','REGISTRATION'); return true;" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">ЗАРЕГЕСТРИРОВАТЬСЯ</a></p>
		</div>
		@endif
