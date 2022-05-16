<div>
    <style>
        .rowCategory{
            cursor: pointer;
            transition: 0.3s all;
        }
        .rowCategory:hover{
            background-color: rgb(227, 241, 255) !important;
            font-weight: bold;
            font-size: 11pt;
            transition: 0.3s all;
        }
    </style>

    {{-- Slider Here --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="bootstrap-carousel">
                        <div data-ride="carousel" class="carousel slide" id="carouselExampleCaptions">
                            <?php $i=1;?>
                            <ol class="carousel-indicators">
                                @php
                                    $iNumber=0;
                                @endphp
                                @foreach ($sliders as $slide)
                                    <li data-slide-to="{{ $iNumber++ }}" data-target="#carouselExampleCaptions"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($sliders as $key=>$slide)
                                    <div class="carousel-item {{ $key == 0 ? 'active':''}}">
                                        <img class="d-block w-100" src="{{ asset('assets/images/sliders') }}/{{ $slide->image }}" height="450">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>{{ $slide->title }}</h4>
                                            <p>{{ $slide->subtitle }}</p>
                                            <span class="badge badge-{{ $slide->status == 0 ? 'success':'danger' }}" style="font-size: 10pt; color: white">{{ $slide->status == 0 ? 'ACTIVE':'INACTIVE' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a data-slide="prev" href="#carouselExampleCaptions" class="carousel-control-prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span> 
                            </a>
                            <a data-slide="next" href="#carouselExampleCaptions" class="carousel-control-next">
                                <span class="carousel-control-next-icon"></span> 
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Home Slider</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.addhomeslider') }}" type="button" class="btn btn-success btn-sm">New Slider</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('messageAddSlider'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>New Slider!</strong> {{ Session::get('messageAddSlider') }}
                        </div>
                    @endif
                    @if (Session::has('messageEditSlider'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Update Slider!</strong> {{ Session::get('messageEditSlider') }}
                        </div>
                    @endif
                    @if (Session::has('messageDelSlide'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Deleted! </strong>Slider ID: <strong>{{ Session::get('messageDelSlideId') }}</strong> {{ Session::get('messageDelSlide') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    {{-- <th>Date</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slide)
                                    <tr class="rowCategory" onclick="window.location='{{ route('admin.edithomeslider', ['slide_id'=>$slide->id]) }}'">
                                        <td>{{ $slide->id }}</td>
                                        <td><img src="{{ asset('assets/images/sliders') }}/{{ $slide->image }}" width="120" alt=""></td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->subtitle }}</td>
                                        <td>{{ currency_IDR($slide->price) }}</td>
                                        <td><a href="{{ $slide->link }}">{{ $slide->link }}</a></td>
                                        <td><span class="badge badge-{{ $slide->status == 0 ? 'success':'danger' }}">{{ $slide->status == 0 ? 'Active':'Inactive' }}</span></td>
                                        {{-- <td>{{ $slide->created_at }}</td> --}}
                                        <td>
                                            <a href="{{ route('admin.edithomeslider', ['slide_id'=>$slide->id]) }}" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                            <a href="#" wire:click.prevent="deleteSlide({{ $slide->id }})"><i class="fa fa-trash" style="color: red"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
