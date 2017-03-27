@extends('base.page')

{{-- Page title --}}
@section('title')
    Post
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/news.css') }}
    {{ Html::style('/vendor/plugins/animate/animate.min.css') }}
    {{ Html::style('/assets/css/font-awesome.min.css') }}
    {{ Html::style('/assets/css/frontend/blog.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/wow/js/wow.min.js') }}
    <script>
        jQuery(document).ready(function () {
            new WOW().init();
        });
    </script>
@stop

@section('content')

    <div class="row">
        <!-- Jelly-o sesame Section Strat -->
        <div class="col-sm-7 col-md-8 wow zoomIn" data-wow-duration="3.5s">
            <div class="col-md-12">
                <div class="news_item_image thumbnail">
                    <label>
                        <a href="{{ URL::to('news_item') }}"><h3 class="primary news_headings">Jelly-o sesame snaps halvah croissant oat cake cookie</h3></a>
                    </label>
                    <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="image" class="img-responsive img_b2">
                    <div class="news_item_text_1">
                        <p>
                            Those who studied Latin back in high school will have tough luck trying to translate this text. Those involved in graphic design, however, are probably familiar with—and terribly bored by—it. It's not an excerpt from an epic saga, but rather pseudo-Latin meant merely to illustrate typeface characteristics and where words will sit on a page. Richard McClinktock, a Latin scholar and director.
                            <br>
                            <br> Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.
                            <br>
                            <br> Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables. Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed base portals after maintainable products
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            </div>
        </div>
        <div class="col-sm-5 col-md-4 col-full-width-left">
            <!-- Featured Author Section Start -->
            <div class="the-box  no-margin more-padding martop3 wow slideInDown" data-wow-duration="3.5s">
                <h3>Featured Authors</h3>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <p>
                            <a href="#">
                                <img src="{{ asset('/assets/images/demos/avatars/demo.png') }}" class="img-responsive img-circle" alt="riot">
                            </a>
                        </p>
                    </div>
                    <!-- /.col-xs-3 -->
                    <div class="col-xs-3">
                        <p>
                            <a href="#">
                                <img src="{{ asset('/assets/images/demos/avatars/demo.png') }}" class="img-responsive img-circle" alt="riot">
                            </a>
                        </p>
                    </div>
                    <!-- /.col-xs-3 -->
                    <div class="col-xs-3">
                        <p>
                            <a href="#">
                                <img src="{{ asset('/assets/images/demos/avatars/demo.png') }}" class="img-responsive img-circle" alt="riot">
                            </a>
                        </p>
                    </div>
                    <!-- /.col-xs-3 -->
                    <div class="col-xs-3">
                        <p>
                            <a href="#">
                                <img src="{{ asset('/assets/images/demos/avatars/demo.png') }}" class="img-responsive img-circle" alt="riot">
                            </a>
                        </p>
                    </div>
                    <!-- /.col-xs-3 -->
                </div>
                <!-- /.row -->
                <button class="btn btn-success btn-block">Browse all author</button>
            </div>
            <!-- //Featured Author Section End -->
            <!-- /.the-box .bg-primary .no-border .text-center .no-margin -->
            <!-- Recent Post Section Start -->
            <div class="the-box wow slideInRight" data-wow-duration="1.5s">
                <h3 class="small-heading more-margin-bottom">Recent News</h3>
                <ul class="media-list">
                    <li class="media">
                        <div class="media-body">
                            <div class="media-heading">
                                <a href="#"><h4 class="primary news_headings">Germany Basks in 4th World Cup After 24-Year Wait</h4></a>
                                <h6 class="text-danger">Today</h6>
                            </div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <div class="media-heading">
                                <a href="#">
                                    <h4 class="primary news_headings"> News World news Paris Anti-Israeli protesters attack Paris synagogue</h4>
                                </a>
                                <h6 class="text-danger">yesterday</h6>
                            </div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <div class="media-heading">
                                <a href="#">
                                    <h4 class="primary news_headings">Egypt proposes Israel-Gaza ceasefire</h4></a>
                                <h6 class="text-danger">Day Before Yesterday</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Recent Post Section End -->
            <div class="the-box wow slideInRight" data-wow-duration="1.5s">
                <h3>Top Reviews</h3>
                <div class="tab-pane active" id="tab_default_1">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('/assets/images/demos/avatars/demo.png') }}" alt="image">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5></a>
                            <h6 class="text-danger">May 13, 2015</h6>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('/assets/images/demos/avatars/demo.png') }}" alt="image">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5>
                            </a>
                            <h6 class="text-danger">May 12, 2015</h6>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star-o text-primary"></i>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('/assets/images/demos/avatars/demo.png') }}" alt="image">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5></a>
                            <h6 class="text-danger">May 11, 2015</h6>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star-o text-primary"></i>
                            <i class="fa fa-star-o text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.the-box .no-border -->
        </div>
        <!-- //Jelly-o sesame Section End -->
    </div>

@stop
