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
                            <h5>Level 1</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <?php
                                if(!empty($ones))
                                {

                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ones as $key => $value)
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->status?></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Level 2</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <?php
                                if(!empty($twos))
                                {

                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($twos as $key => $value)
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row">{{$j++}}</th>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->status?></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Level 3</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <?php
                                if(!empty($threes))
                                {

                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach ($threes as $key => $value)
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row">{{$k++}}</th>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->status?></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Level 4</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <?php
                                if(!empty($fours))
                                {

                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($fours as $key => $value)
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row">{{$l++}}</th>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->status?></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Level 5</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="card-block table-border-style">
                                <?php
                                if(!empty($fives))
                                {

                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($fives as $key => $value)
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row">{{$m++}}</th>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->status?></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Level 6</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <?php
                            if(!empty($sixs))
                            {

                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>UserName</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($sixs as $key => $value)
                                    {
                                    ?>
                                    <tr>
                                        <th scope="row">{{$n++}}</th>
                                        <td><?=$value->name?></td>
                                        <td><?=$value->status?></td>
                                    </tr>
                                    <?php
                                    }?>

                                    </tbody>
                                </table>
                            </div>
                                <?php
                                }else {
                                    echo '<div class="well well-sm">No Users Found</div>';
                                }?>
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
