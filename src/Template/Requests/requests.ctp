<div class="page-title">
    <div class="page-title-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Records</li>
            </ol>
        </div>
    </div>
</div><!-- page-title -->

<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-white">
                <div class="panel-actions">
                    <?php echo $this->Html->link('New Record', array('controller' => 'Pages', 'action' => 'home'), array('class' => 'btn m--bg-fill-theme btn-rounded btn-rounded-semi'));
                    ?>
                </div><!-- panel-actions -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //foreach ($members as $key => $value) : 
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        foreach ($data as $newline) {
                                            echo '<h3 style="color:#453288">' . $newline . '</h3><br>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- Main Wrapper -->