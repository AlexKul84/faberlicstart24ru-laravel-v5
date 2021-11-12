<div id="content-page" class="content group">
  <div class="hentry group">
    <p class="cent-str">Для регистрации на официальном сайте Faberlic кликните на кнопку ниже. Регистрация на сайте бесплатная, не требует паспортных данных и занимает меньше минуты.</p>
    <p class="btn-reg"><a href="{{ asset(env('REGISTER')) }}" onclick="ym(69596722,'reachGoal','REGISTRATION'); return true;" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">ЗАРЕГЕСТРИРОВАТЬСЯ</a></p>
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
  <!-- START COMMENTS -->
  <div id="comments">
  </div>
  <!-- END COMMENTS -->
</div>
</div>
