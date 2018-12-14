<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix').'/artist') }}'><i class='fa fa-user'></i> <span>Artists</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix').'/provider') }}'><i class='fa fa-building'></i> <span>Providers</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix').'/song') }}'><i class='fa fa-music'></i> <span>Songs</span></a></li>

<li><a href='{{ url(config('backpack.base.route_prefix').'/provider') }}'><i class='fa fa-play'></i> <span>Genres</span></a></li>