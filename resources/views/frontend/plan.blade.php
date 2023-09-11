@include('frontend.common.header')
@include('frontend.common.sidebar')

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                        <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.blade.php"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bootstrap Tables</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Basic Tables</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
$i=$j=$k=$l=$m=$n=1;
?>
<!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Plan Select</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Material Form Inputs With Static Label</h5>
                                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                        </div>
                                        <div class="card-block">
                                            <form method="POST" action="{{url('active')}}" class="form-material">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">
                                                        <select name="select" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="10">$10</option>
                                                            <option value="50">$50</option>
                                                            <option value="100">$100</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Deposit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>

@include('frontend.common.footer')
