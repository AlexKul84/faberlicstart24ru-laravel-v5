<div class="inner-article">
<div id="content-blog" class="content group">

@if(Route::currentRouteName() == 'articles.index')
          <h1>СТАТЬИ</h1>
@endif

  @if($articles)
  	@foreach($articles as $article)
			<!--small image-->
			<div class="hentry hentry-post blog-small group ">
				<!-- post featured & title -->
				<div class="thumbnail">
						<!-- post title -->

						<h2 class="post-title"><a href="{{ route('articles.show',['alias'=>$article->alias]) }}">{{ $article->title_article }}</a></h2>
						<!-- post meta -->
						<div class="meta group">
								<p class="date">
								 <span class="month">{{ $article->created_at->format('M') }}</span>
								 <span class="day">{{ $article->created_at->format('d') }}</span>
								</p>
								<p class="author"><span>Автор: {{ $article->user->name }}</span></p>
								<p class="categories"><span>Раздел: {{ $article->category->title }}</span></p>
								<p class="comments"><span>{{ count($article->comments) ? count($article->comments) : '0' }} {{ Lang::choice('ru.comments',count($article->comments)) }}</span></p>
						</div>
						<!-- post featured -->
						<div class="image-wrap">
							<img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->max }}" alt="{{ $article->alt_img }}" title="{{ $article->title_img }}" />
						</div>
				</div>
				<!-- post content -->
				<div class="the-content group">
					{!! $article->desc !!}
					<p><a href="{{ route('articles.show',['alias' => $article->alias]) }}" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link"> {{ Lang::get('ru.read_more') }}</a></p>
				</div>
			</div>
 		@endforeach
    <div class="general-pagination group">
    	@if($articles->lastPage() > 1)
    		@if($articles->currentPage() !== 1)
    			<a href="{{ $articles->url(($articles->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
    		@endif
    		@for($i = 1; $i <= $articles->lastPage(); $i++)
    			@if($articles->currentPage() == $i)
    				<a class="selected disabled">{{ $i }}</a>
    			@else
    				<a href="{{ $articles->url($i) }}">{{ $i }}</a>
    			@endif
    		@endfor
    		@if($articles->currentPage() !== $articles->lastPage())
    			<a href="{{ $articles->url(($articles->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
    		@endif
    	@endif
    </div>
			@else
				{!! Lang::get('ru.articles_no') !!}
			@endif
</div>
</div>
