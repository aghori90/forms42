<?php use Cake\Routing\Router; ?>
<?php echo $this->Html->css('monthpicker')?>
<?php echo $this->Html->script('monthpicker.min')?>
<?php echo $this->Html->script('fontawesome') ?>
<?php echo $this->Html->css('font-awesome.min') ?>

<style>
    /*
    label {
        margin: 19px 0px -4px 111px;
        font-size: larger;
    }
    .input.text {
        margin: -9% -6% -9% 57%;
        width: 560.711px;
    }
    */
    thead {
        background-color: crimson;
        color: white;
        font-family: 'FontAwesome';
        font-size: medium;
    }
    .corct{
        color: mediumspringgreen;
        font-weight: bold;
        font-size: x-large;
    }
    .wrng{
        color: orangered;
        font-weight: bold;
        font-size: x-large;
    }
    .vcp_cover {
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    .vcp_box {
        display: inline-block;
        width: 50%;
        text-align: center;
        box-sizing: border-box;
        margin: 5px 0;
    }
</style>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="Search">
                <!--For Search-->
                <div class="card-header bg-primary text-white">Month Wise Report</div>
                <div class="container-fluid">
                    <fieldset>
                        <?php echo $this->Form->create('mprSumry', ['url' => ['controler' => 'SeccCardholders', 'action' => 'mprSumRprt']]) ?>
                        <div class="row">
                            <!--<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="MonthYear"><b>Select Month & Year :</b></label>
                        <?php echo $this->Form->control('mnthYr', ['label' => '', 'class' => 'form-control inpBx', 'id' => 'demo-1']); ?>
                    </div>
                </div>
                <div style=" margin: 17px 0px 21px 350px;">
                    <button type="submit" class="btn btn-outline-info submitt">Search</button>
                </div>-->
                            <div class="vcp_cover">
                                <div class="vcp_box"><span><b>Select Month & Year :</b></span></div>
                                <div class="vcp_box"><?php echo $this->Form->control('mnthYr', ['label' => '', 'class' => 'form-control inpBx', 'id' => 'demo-1']); ?></div>
                                <div class="vcp_box"><button type="submit" class="btn btn-outline-info submitt">Search</button></div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card.Result {
        float: left;
        /*width: 930px;*/
        overflow-x: scroll;
    }

</style>

    <!--For data table-->
        <?php if ($this->getRequest()->is('post')) { ?>
            <style>
                .vcp_full{
                    margin-bottom: 14px;
                    display: inline-block;
                    width: 179%;
                }
            </style>
<!--            <div class="mt-4" id="b-inner-sec">-->
                <div class="container">
                    <div class="card">
                        <div class="card Result">
                            <div class="card-header bg-primary text-white vcp_full" style="margin-bottom: 14px;"> MPR STATUS REPORT </div>
<!--                            <div class="container-fluid">-->
                                <table class="table table-bordered table-striped ">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Form Code</td>
                                        <td>Bokaro</td>
                                        <td>Chatra</td>
                                        <td>Deoghar</td>
                                        <td>Dhanbad</td>
                                        <td>Dumka</td>
                                        <td>East Singhbhum</td>
                                        <td>Garhwa</td>
                                        <td>Giridih</td>
                                        <td>Godda</td>
                                        <td>Gumla</td>
                                        <td>Hazaribag</td>
                                        <td>Jamtara</td>
                                        <td>Khunti</td>
                                        <td>Koderma</td>
                                        <td>Latehar</td>
                                        <td>Lohardaga</td>
                                        <td>Pakur</td>
                                        <td>Palamu</td>
                                        <td>Ramgarh</td>
                                        <td>Ranchi</td>
                                        <td>Sahibganj</td>
                                        <td>Seraikela-Kharsawan</td>
                                        <td>Simdega</td>
                                        <td>West Singhbhum</td>
                                    <tr>
                                    </thead>
                                    <tbody align="center">
                                    <?php
                                    if (!empty($selectDatas)) {
                                        $SlNo = 1;
                                        foreach ($selectDatas as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $SlNo; ?></td>
                                                <td><?php echo $value['form_code']; ?></td>
                                                <td>
                                                    <?php
                                                    if($value['Bokaro'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Chatra'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Deoghar'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Dhanbad'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa  fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Dumka'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['PurbiSinghbhum'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Garhwa'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Giridih'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Godda'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Gumla'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Hazaribagh'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Jamtara'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Khunti'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Kodarma'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Latehar'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Lohardaga'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Pakur'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Palamu'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Ramgarh'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Ranchi'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Sahibganj'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['SaraikelaKharsawan'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['Simdega'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value['PashchimiSinghbhum'] == 0 || '') {
                                                        echo '<i class="fa fa-times wrng" aria-hidden="true"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa fa-check corct" aria-hidden="true"></i>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $SlNo++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="26">Sorry ! No Records Found.</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
<!--                            </div>-->
                        </div>
                    </div>
                </div>
<!--            </div>-->
        <?php } ?>





<script>
    $('#demo-1').Monthpicker();
</script>
