
@if($catalogs && count($catalogs) > 0)
	<div id="content-home" class="content group">
    <div class="hentry group">
			<p class="btn-reg"><a href="{{ asset(env('REGISTER')) }}" onclick="ym(69596722,'reachGoal','REGISTRATION'); return true;" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">ПЕРЕЙТИ В ИНТЕРНЕТ-МАГАЗИН</a></p>
      <div class="section portfolio">
        <h1 class="title">{{trans('ru.latest_project')}}</h1>
					@if($catalogs)
			      <ul id="portfolio" class="three-columns">
			        @foreach($catalogs as $catalog)
			          <li class="one-third">
			            <div class="overlay_a">
			              <div class="overlay_wrapper">
			                <img src="{{ asset(env('THEME')) }}/images/projects/{{ $catalog->img->max }}" alt="{{ $catalog->alt }}" title="Фото каталога" />
			                <div class="overlay">
			                  <a class="overlay_project" href="{{ $catalog->link }}" onclick="ym(69596722,'reachGoal','CATALOGLINK'); return true;"></a>
			                </div>
			              </div>
			            </div>
									<div class="one-third-desc">
				            <p><a href="{{ $catalog->link }}" onclick="ym(69596722,'reachGoal','CATALOGLINK'); return true;">{{ $catalog->title }}</a></p>
				            <p>{{ $catalog->text }}</p>
				            <a class="read-more" href="{{ $catalog->link }}" onclick="ym(69596722,'reachGoal','CATALOGLINK'); return true;">Смотреть онлайн каталог</a>
								</div>
								</li>
			        @endforeach
			      </ul>
			      <div class="clear"></div>
			      <p class="btn-reg"><a href="{{ asset(env('REGISTER')) }}" onclick="ym(69596722,'reachGoal','REGISTRATION'); return true;" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">ЗАРЕГЕСТРИРОВАТЬСЯ</a></p>
			    </div>
			    @endif
					<div class="clear"></div>
      </div>
      <div class="clear"></div>
  	</div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
	</div>
@else
	<p>Нет</p>
@endif
