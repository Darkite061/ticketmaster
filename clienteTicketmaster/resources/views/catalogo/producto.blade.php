@extends('layouts.frontend')


@section('content')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    @foreach ($events as $event)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="http://127.0.0.1:8001{{$event->image}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><a class="fw-bolder text-black-50" href="/detalle/{{$event->id}}" style="text-decoration: none; color: black;">{{$event->name}}</a></h5>
                                        <!-- Product price-->
                                        {{$event->description}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $event->id }}" name="id">
                                        <input type="hidden" value="{{ $event->name }}" name="name">
                                        <input type="hidden" value="{{ $event->price_tickets }}" name="price">
                                        <input type="hidden" value="{{ $event->image }}"  name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <div class="text-center"><button class="btn btn-outline-dark mt-auto">Add To Cart</button></div>
                                    </form>
                                    {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/detalle/{{$event->id}}">View</a></div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        @endsection
