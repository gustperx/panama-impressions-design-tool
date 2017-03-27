@extends('base.page')

{{-- Page title --}}
@section('title')
    Producto
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/cart.css') }}
    {{ Html::style('/assets/css/font-awesome.min.css') }}
    {{ Html::style('/assets/css/frontend/tabbular.css') }}
    {{ Html::style('/vendor/plugins/bootstrap-rating/bootstrap-rating.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/assets/js/frontend/elevatezoom.js') }}
    {{ Html::script('/vendor/plugins/bootstrap-rating/bootstrap-rating.js') }}
    {{ Html::script('/assets/js/frontend/cart.js') }}
@stop

@section('content')

    <!--item view start-->
    <div class="row">
        <div class="mart10">
            <!--product view-->
            <div class="col-md-4">
                <div class="row">
                    <div class="product_wrapper">
                        <img id="zoom_09" src="{{ asset('/assets/images/demos/products/laravel.png') }}" data-zoom-image="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" />
                    </div>
                </div>
                <div class="row">
                    <!--individual products in product view-->
                    <div id="gal1">
                        <a href="#" data-image="{{ asset('/assets/images/demos/products/laravel.png') }}" data-zoom-image="{{ asset('/assets/images/demos/products/laravel.png') }}">
                            <img id="img_01" src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" />
                        </a>
                        <a href="#" data-image="{{ asset('/assets/images/demos/products/laravel.png') }}" data-zoom-image="{{ asset('/assets/images/demos/products/laravel.png') }}">
                            <img id="img_01" src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" />
                        </a>
                        <a href="#" data-image="{{ asset('/assets/images/demos/products/laravel.png') }}" data-zoom-image="{{ asset('/assets/images/demos/products/laravel.png') }}">
                            <img id="img_01" src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" />
                        </a>
                        <a href="#" data-image="{{ asset('/assets/images/demos/products/laravel.png') }}" data-zoom-image="{{ asset('/assets/images/demos/products/laravel.png') }}">
                            <img id="img_01" src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" />
                        </a>
                    </div>
                </div>
            </div>
            <!--individual product description-->
            <div class="col-md-8">
                <h2 class="text-primary">Neque porro quisquam </h2>
                <i class="fa fa-star text-primary"></i>
                <i class="fa fa-star text-primary"></i>
                <i class="fa fa-star text-primary"></i>
                <i class="fa fa-star text-primary"></i>
                <i class="fa fa-star-o text-primary"></i>
                <h5>5 Review(s) | Add your Review</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>
                <div class="text-big3">
                    <del>$1000</del>
                </div>
                <div class="text-big4">$750</div>
                <a href="#" class="btn btn-primary btn-lg text-white">Add to Cart</a>
                <h4>Quantity</h4>
                <form>
                    <div class="form-group">
                        <input type="number" class="form-control" min="1" style="width:70px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--item view end-->
    <!--item desciption start-->
    <div class="row">
        <div class="col-sm-12">
            <!-- Tabbable-Panel Start -->
            <div class="tabbable-panel">
                <!-- Tabbablw-line Start -->
                <div class="tabbable-line">
                    <!-- Nav Nav-tabs Start -->
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab">
                                Description </a>
                        </li>
                        <li>
                            <a href="#tab_default_2" data-toggle="tab">
                                Reviews </a>
                        </li>
                    </ul>
                    <!-- //Nav Nav-tabs End -->
                    <!-- Tab-content Start -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus.</p>
                            <ul>
                                <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#555555" data-hc="#555555"></i> White dwarf extraplanetary</li>
                                <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#555555" data-hc="#555555"></i>Worldlets, white dwarf</li>
                                <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#555555" data-hc="#555555"></i>Cambrian explosion, hydrogen</li>
                                <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#555555" data-hc="#555555"></i>Euclid Sea of Tranquility</li>
                            </ul>
                            <p>Coffin quarter pipe NoMeansNo switch sponsored hospital flip. Fastplant 270 skater boned out yeah. Stoked boardslide hardware air nose-bump. Manual hang ten ledge Vision Streetwear backside hang-up. Streets on Fire wall ride nose grab rail speed wobbles hang ten. Invert hand rail snake skate key hurricane. Hanger concave rail no comply rail slide. Nose bump gnarly 180 soul skate shinner. Jason Dill Japan air hang ten camel back goofy footed frontside air. Melancholy axle set handplant kickflip Donger fakie.</p>
                        </div>
                        <div class="tab-pane" id="tab_default_2">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form>
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Review</label>
                                            <textarea class="form-control" rows="3" id="resize_vert"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="uname">Your Ratings:</label>
                                            <input type="hidden" id="rating3" class="rating form-control" data-filled="fa fa-star fa-1x" data-empty="fa fa-star-o fa-1x" />
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="btn btn-primary text-white">Submit</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-8">
                                    <h3 class="text-primary">Reviews</h3>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star-o text-primary"></i>
                                    <h6>Jim J. Platz</h6>
                                    <h6>jan 31, 2015</h6>
                                    <strong>Trout Burrowing</strong>
                                    <p>Burbot yellow-eye mullet sailback scorpionfish sandroller snake mudhead limia sea chub Asiatic glassfish marblefish pikehead snook. Atlantic eel Rio Grande perch stingray longjaw mudsucker albacore northern sea robin spotted dogfish northern sea robin river stingray. </p>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star text-primary"></i>
                                    <i class="fa fa-star-half-empty text-primary"></i>
                                    <i class="fa fa-star-o text-primary"></i>
                                    <h6>Jim J. Platz</h6>
                                    <h6>feb 6, 2015</h6>
                                    <strong>Trout Burrowing</strong>
                                    <p>Burbot yellow-eye mullet sailback scorpionfish sandroller snake mudhead limia sea chub Asiatic glassfish marblefish pikehead snook. Atlantic eel Rio Grande perch stingray longjaw mudsucker albacore northern sea robin spotted dogfish northern sea robin river stingray. </p>
                                    <nav class="pull-right">
                                        <ul class="pagination">
                                            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                            <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                                            <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                                            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Tab-content End -->
                    </div>
                    <!-- //Tabbable-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>
        </div>
    </div>
    <!--item desciption end-->
    <!--recently view item-->
    <div class="row">
        <h2 class="text-primary"> Recently Viewed</h2>
        <div class="divider"></div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1599.00</del>  Rs. 1198.00   </h4>
                </figcaption>
            </figure>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Atelier Check Shirt</h4>
                    <ul class="hidden-xs">
                        <li>Product -Men's Club Wear</li>
                        <li>Care - Machine/Hand Wash</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Sony Xperia C3 - (Black)</h4>
                    <ul class="hidden-xs">
                        <li>Android v4.4.2 (KitKat)</li>
                        <li>Quad-core 1.2 GHz</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 21,990</del>  Rs. 18,088</h4>
                </figcaption>
            </figure>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Samsung Galaxy S6 64 GB - (White)</h4>
                    <ul class="hidden-xs">
                        <li>Android v4.4.2 (KitKat)</li>
                        <li>Quad-core 1.2 GHz</li>
                    </ul>
                    <h4 class="text-white hidden-xs">Rs. 55,900</h4>
                </figcaption>
            </figure>
        </div>
    </div>
    <!--recently view item end-->

@stop
