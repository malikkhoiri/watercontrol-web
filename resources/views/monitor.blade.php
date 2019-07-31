@extends('welcome')

@section('content')
    <!--PRICING AREA-->
    <section class="price-area padding-100-70 sky-gray-bg" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Water <span>Control</span></h2>
                        <!-- <p>SomeText</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-price center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="price-hidding">
                            <h2>Temperature</h2>
                        </div>
                        <div class="price-rate">
                            {!! $chart1->render() !!}
                        </div>
                        <div class="price-details">
                            <ul>
                                <li id="statusTemp"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="single-price center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="price-hidding">
                                    <h2>PH</h2>
                                </div>
                                <div class="price-rate">
                                    <h2>
                                        <span id="ph"></span>
                                        <sub id="statusPH"></sub>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="single-price center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="price-hidding">
                                    <h2>Tinggi (cm)</h2>
                                </div>
                                <div class="price-rate">
                                    <h2>
                                        <span id="high"></span>
                                        <sub id="statusHigh"></sub>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="single-price center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="price-hidding">
                                    <h2>Kualitas</h2>
                                </div>
                                <div class="price-rate">
                                    <h2>
                                        <span id="quality"></span>
                                        <sub id="statusQuality"></sub>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="single-price center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="price-hidding">
                                    <h2>Heater</h2>
                                </div>
                                <div class="price-rate">
                                    <h2 id="statusHeater"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PRICING AREA END-->
@endsection

@section('script')
    <script type="text/javascript">
        function updateData() {
            fetch('{{asset('storage/data.json')}}')
                .then(function(response) {
                    return response.json();
                })
                .then(function(myJson) {
                    if(myJson.temp > 30)
                        document.getElementById('statusTemp').innerHTML = "Panas";
                    else if (myJson.temp < 25)
                        document.getElementById('statusTemp').innerHTML = "Dingin";
                    else
                        document.getElementById('statusTemp').innerHTML = "Normal";

                    document.getElementById('ph').innerHTML = myJson.ph;

                    if(myJson.ph > 8)
                        document.getElementById('statusPH').innerHTML = "Asam";
                    else if (myJson.temp < 6)
                        document.getElementById('statusPH').innerHTML = "Basa";
                    else
                        document.getElementById('statusPH').innerHTML = "Normal";

                    document.getElementById('high').innerHTML = myJson.high;

                    if(myJson.high >= 11)
                        document.getElementById('statusHigh').innerHTML = "Tinggi";
                    else if (myJson.temp <= 9)
                        document.getElementById('statusHigh').innerHTML = "Rendah";
                    else
                        document.getElementById('statusHigh').innerHTML = "Normal";

                    document.getElementById('quality').innerHTML = myJson.q;

                    if(myJson.q > 0)
                        document.getElementById('statusQuality').innerHTML = "Baik";
                    else
                        document.getElementById('statusQuality').innerHTML = "Buruk";

                    if(myJson.heater > 0)
                        document.getElementById('statusHeater').innerHTML = "ON";
                    else
                        document.getElementById('statusHeater').innerHTML = "OFF";
                });
        }

        setInterval(updateData, 1000);
    </script>
@endsection
