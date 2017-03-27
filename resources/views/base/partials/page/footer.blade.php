<!-- Footer Section Start -->
<footer>

    <div class="container footer-text">

        <!-- About Us Section Start -->
        <div class="col-sm-4">

            <h4 class="menu">Síguenos</h4>

            <ul class="list-inline">

                @include('layouts.components.socials')

            </ul>

        </div>
        <!-- //About us Section End -->

        <!-- Contact Section Start -->
        <div class="col-sm-4">

            <h4>Contacto</h4>

            <ul class="list-unstyled">

                @include('layouts.components.contact')

            </ul>

        </div>
        <!-- //Contact Section End -->

        <!-- Recent post Section Start -->
        <div class="col-sm-4">

            <h4>Últimos Post</h4>

            {{--
            @forelse(News::recent() as $post)

                <div class="media">

                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ asset("storage/".$post->user->img_profile) }}" alt="image">
                        </a>
                    </div>

                    <div class="media-body">

                        <p class="media-heading">
                            <a href="{{ route('web.news.item', $post->slug) }}">
                                {!! str_limit($post->title, 50) !!}
                            </a>
                        </p>

                        <p class="pull-right"><i>{{ $post->user->fullname }}</i></p>
                    </div>

                </div>

            @empty

                <div class="media">

                    No hay noticias disponibles

                </div>

            @endforelse
            --}}

        </div>
        <!-- //Recent Post Section End -->

    </div>

</footer>

<!-- //Footer Section End -->
<div class="copyright">
    <div class="container">
        @include('layouts.components.credits')
    </div>
</div>

