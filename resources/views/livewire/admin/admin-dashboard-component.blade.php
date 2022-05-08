@push('styles')
<!-- Pignose Calender -->
<link href="{{ asset('admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
<!-- Chartist -->
<link rel="stylesheet" href="{{ asset('admin/plugins/chartist/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
@endpush
<div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Products Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Net Profit</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ 8541</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">New Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Customer Satisfaction</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">99%</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-facebook">
                    <span class="s-icon"><i class="fa fa-facebook"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-linkedin">
                    <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-googleplus">
                    <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-twitter">
                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<!-- Chartjs -->
<script src="{{ asset('admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Circle progress -->
<script src="{{ asset('admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
<!-- Datamap -->
<script src="{{ asset('admin/plugins/d3v3/index.js') }}"></script>
<script src="{{ asset('admin/plugins/topojson/topojson.min.js') }}"></script>
<!-- Morrisjs -->
<script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
<!-- Pignose Calender -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
<!-- ChartistJS -->
<script src="{{ asset('admin/plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
@endpush