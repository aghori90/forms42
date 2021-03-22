<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>


<!--==================================================================================-->

<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
?>
<style type="text/css">
    .rectangle{
        box-shadow: 1.5px 2px 2px #150f0fb0;
        border-radius: 5px;
        padding: 9px 0px;
        position:relative;
        display: table-cell;
        margin-right: 10px !important;
        vertical-align: middle;
        padding:2px;
        width: 130px;
    }
    .trHead{
        background-color:#12b1a2;
        color: #ffffff;
    }
    #licence{
        color: #19b50e;
        font-weight: bold;
    }
    button.btnBx {
        background-color: none;
        background-color: #fdfdfd00;
        border: none;
        color: blue;
        cursor: pointer;
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 14px;
    }
    label.orTag {
        border: 1px solid red;
        margin-top: 32px;
        margin-right: -20px;
        padding: 4px 8px 5px 7px;
        border-radius: 18px;
        color: red;
        margin-left: 53px;
    }
    .input.text {
        margin-top: -2px;
    }
    *, ::after, ::before {
        box-sizing: border-box;
        border-radius: 3px;
        /*font-weight: bolder;*/
    }
    .fldDc {
        margin-left: 67px;
    }
    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0,0,0,0);
        margin-left: 21px;
        border-radius: 23px;
    }
    sub, sup {
        position: relative;
        font-size: 100%;
        line-height: 0;
        vertical-align: baseline;
        color: red;
    }
</style>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php
// echo "test";
?>
<div class="bg-light">
    <div class="container">
        <ul class="breadcrumb bg-light pl-0">
        </ul>
    </div>
</div>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">FORM 42 ENTRY</div>
            <?php echo $this->Form->create('nfsaRationcardApprovalFrm',['name'=>'nfsaRationcardApprovalFrm','id'=>'nfsaRationcardApprovalFrm']); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Form :</b></label>
                                <?php echo $this->Form->select('secy_smp_dmp_id', $formType, ['id' => 'secy_smp_dmp_id', 'class' => 'form-control', 'empty' => '--Select Form--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Months :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('month',  ['label'=>'','id' => 'demo-1', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                            <div style="float: right; margin-right: 16px; margin-bottom: 15px;">
                                <button type="submit" class="btn btn-outline-info submitt">Search</button>
                            </div>
                </fieldset>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script type="text/javascript">
    // todo: monthPicker
    $('#demo-1').Monthpicker();
</script>

