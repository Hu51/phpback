<div class="row">
    <div class="col-md-10 col-md-offset-1 dashboard-center">
       <?php $this->load->view("admin/dashboard/nav"); ?>
        <!-- /navbar -->
        <div class="row">
            <table class="table table-condensed" style="font-size:15px;width:80%;margin-left:10%;">
                <thead>
                <tr>
                    <th>Log</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?= $log->content; ?></td>
                        <td><?= $log->date; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
