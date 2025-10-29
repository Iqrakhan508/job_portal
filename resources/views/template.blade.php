<!DOCTYPE html>
<html>

<head>

    <!-- css include start -->
    @include('includes.header_css')

    @stack('styles')
    <!-- css include end -->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation menu start  -->
        @include('includes.left_menu')
        <!-- Navigation menu end  -->

        <div id="page-wrapper" class="gray-bg">

            <!-- top menu start -->
            @include('includes.top_menu')
            <!-- top menu end -->



            <!-- breadcrumb menu start -->
            @include('includes.bredcrum_menu')
            <!-- breadcrumb end -->


            <div class="wrapper wrapper-content animated fadeInRight">


                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}

                                </div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- Page specific content start  -->

                                @yield('content')

                                <!-- Page specific content end  -->


                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <!-- footer start -->
            @include('includes.footer_menu')
            <!-- footer end -->

        </div>
    </div>
    <!-- JS footer start -->
    @include('includes.footer_script')

    @stack('scripts')
    @yield('scripts')
    <!-- JS footer end -->


    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>