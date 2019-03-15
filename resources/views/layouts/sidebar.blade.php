
<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   

    <form method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
       <p class="login-box-msg"> Registered Email-id</p>
        <input type="email" class="form-control" placeholder="Applicant's Registered Email-id" name="email" value="{{ old('email') }}">
        

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <p class="login-box-msg"> Password</p>
        <input type="password" class="form-control" placeholder="Password" name="password">
       

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
     
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br>
    <a href="{{ url('/password/reset') }}">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
        <div class="search-widget">
            <form action="{{ route('blog') }}">
                <div class="input-group">
                  <input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-lg btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
            </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('category', $category->slug) }}"><i class="fa fa-angle-right"></i> {{ $category->title }}</a>
                            <span class="badge pull-right">{{ $category->posts->count() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach ($popularPosts as $post)
                        <li>
                            @if ($post->image_thumb_url)
                                <div class="post-image">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ $post->image_thumb_url }}" />
                                    </a>
                                </div>
                            @endif
                            <div class="post-body">
                                <h6><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h6>
                                <div class="post-meta">
                                    <span>{{ $post->date }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                        <li><a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Archives</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($archives as $archive)
                        <li>
                            <a href="{{ route('blog', ['month' => $archive->month, 'year' => $archive->year]) }}">{{ month_name($archive->month) . " " . $archive->year }}</a>
                            <span class="badge pull-right">{{ $archive->post_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </aside>
</div>
