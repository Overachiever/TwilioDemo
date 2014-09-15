<div class="row">
    <div class="col-md-4">
        <form method="post" role="form">
            <div class="form-group">
                <label for="keyword">Keyword</label>
                <input class="form-control" name="keyword" id="keyword" value="<?php echo $keyword ?>"/>
            </div>
            <div class="form-group">
                <label for="response">Response</label>
                <textarea class="form-control" name="response" id="response" ><?php echo $response ?></textarea>
            </div>
            <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> <?php echo $messageId ? 'Edit' : 'Add' ?></button>
            <?php if($messageId){ ?>
                <button id="deleteButton" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                <input type="hidden" name="delete" id="delete" value="0"/>
            <?php } ?>
        </form>
    </div>
    <div class="col-md-7 col-md-offset-1">
        <?php if(!empty($messages)){ ?>
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Keyword</th>
                        <th>Response</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($messages as $message){ ?>
                        <tr>
                            <td class="no-wrap"><a href="<?php echo site_url('messages/' . $message->message_id) ?>"><?php echo $message->keyword ?></a></td>
                            <td class="fill-width"><?php echo $message->response ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{ ?>
            <div class="well well-sm"><em>No keywords have been entered.</em></div>
        <?php } ?>
    </div>
</div>
