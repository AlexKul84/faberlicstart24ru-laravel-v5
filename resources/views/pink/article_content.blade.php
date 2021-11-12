<div class="inner-article">
  <div id="content-single" class="content content-article group">
    <div class="hentry hentry-post blog-small group ">
      <!-- post featured & title -->
      @if($article)
      <div class="thumbnail">
  			<!-- post title -->
  			<h1 class="post-title">{{ $article->title_article }}</h1>
  			<!-- post meta -->
  			<div class="meta group">
  				<p class="date">
  					<span class="month">{{ $article->created_at->format('M') }}</span>
  					<span class="day">{{ $article->created_at->format('d') }}</span>
  				</p>
  				<p class="author"><span>{{ $article->user->name }}</span></p>
  				<p class="categories"><span>{{ $article->category->title }}</p>
  				<p class="comments"><span>{{ count($article->comments) ? count($article->comments) : '0' }} {{Lang::choice('ru.comments',count($article->comments))}}</span></p>
  			</div>
      </div>
      <!-- post content -->
      <div class="the-content single group">
        {!! $article->text !!}
        <div class="clear"></div>
        <div class="socials">
          <h2>Понравилась статья, поделись в соцсетях!</h2>
  				<!-- uSocial -->
  				<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
  				<div class="uSocial-Share" data-pid="9548af75c588efc8e7e77e979b093eb6" data-type="share" data-options="rect,style1,default,absolute,horizontal,size24,eachCounter0,counter0,nomobile" data-social="vk,fb,vi"></div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
      <h3 id="comments-title">
        <span>{{ count($article->comments) }}</span> {{ Lang::choice('ru.comments',count($article->comments)) }}
      </h3>
      @if(count($article->comments) > 0)
  	    @set($com,$article->comments->groupBy('parent_id'))
  	    <ol class="commentlist group">
  	    @foreach($com as $k => $comments)
  	    	@if($k !== 0)
  	    		@break
  	    	@endif
  	    	@include(env('THEME').'.comment',['items' => $comments])
  	    @endforeach
  	    </ol>
      @endif
      <!-- END TRACKBACK & PINGBACK -->
      <div id="respond">
        <h3 id="reply-title">Оставте <span>комментарий</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
        <form action="{{ route('comment.store') }}" method="post" id="commentform">
          @if(!Auth::check())
            <p class="comment-form-author"><label for="author">Имя</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true" /></p>
            <p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
          @endif
          <p class="comment-form-comment"><label for="comment">Ваш комментарий</label><textarea id="comment" name="text" cols="45" rows="8"></textarea></p>
          <div class="clear"></div>
          <p class="form-submit">
  	      	{{ csrf_field() }}
  	      	<input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $article->id }}" />
  	      	<input id="comment_parent" type="hidden" name="comment_parent" value="0" />
  	        <input name="submit" type="submit" id="submit" value="Добавить" />
          </p>
        </form>
      </div>
      <!-- #respond -->
    </div>
    <!-- END COMMENTS -->
   		@endif
  </div>
</div>
