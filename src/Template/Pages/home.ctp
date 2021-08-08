<div class="page-title">
    <div class="page-title-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Records</a></li>
                <li class="active">Add new record</li>
            </ol>
        </div>
    </div>
</div><!-- page-title -->
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Record</h3>
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create(); ?>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'label' => 'First name',)); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'label' => 'Last name',)); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="radio" name="gender" value="Male"> Male
                                    <input type="radio" name="gender" value="Female"> Female
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->input('age', array('class' => 'form-control', 'label' => 'Age',)); ?>
                                    <input type="hidden" name="is_api" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city">
                                        <option value="Kigali">Kigali</option>
                                        <option value="Musanze">Musanze</option>
                                        <option value="Nyagatare">Nyagatare</option>
                                        <option value="Rusizi">Rusizi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Living with Diabetes: </label>
                                    <input type="radio" name="diabetic" value="Yes">Yes
                                    <input type="radio" name="diabetic" value="No">No
                                    <input type="radio" name="diabetic" value="Unknown">Unknown
                                </div>
                            </div>
                        </div><!-- row -->
                        <div class="text-right">
                            <button type="submit" class="btn m--bg-fill-theme btn-rounded-semi">Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- panel -->
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- Main Wrapper -->