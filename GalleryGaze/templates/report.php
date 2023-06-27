<style>
.report__background{
    z-index:9999;
    position:fixed;

    top:0;
    left:0;

    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.3);
}

.report__card{
    box-sizing:border-box;

    display:flex;
    flex-direction:column;

    gap:10px;

    max-width: 400px;
    max-height: 300px;
    min-height: 200px;
    width:100%;


    padding: 10px;
    margin:auto;
    background-color: white;
}

.report__card-close-button{
    width: 25px;
    height:25px;

    background-color:red;

    margin-left:auto;
}

.report__card-form{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.report__textarea{
    resize:none;
    height:130px;
}

.report__hidden{
    display:none;
}

</style>

<?php 
    $idToUse = 0;
    if($reportType=="commentReport"){
        $idToUse = @$commentId;
    }else if($reportType=="postReport"){
        $idToUse = @$thisPostId;
    }else if($reportType=="userReport"){
        $idToUse = @$reportedId;
    }
?>

<div class="report__background report__hidden" id="id<?=$idToUse?>">
    <div class="report__card">
        <button onclick="closeReport(<?=@$idToUse?>)"class="report__card-close-button">X</button>
        <form class="report__card-form" action="../backend/handleReport.php" method="post">
            <input type="hidden" name="postId" value="<?=@$thisPostId?>">
            <input type="hidden" name="commentId" value="<?=@$commentId?>">
            <input type="hidden" name="reportedId" value="<?=@$reportedId?>">
            <input type="hidden" name="description" value="<?=@$thisPostDescription?>">
            <label for="reason">Choose a report reason:</label>

            <select id="reason" name="reason">
                <option value="explicit-content">Excplicit content</option>
                <option value="terrorism">Terrorism</option>
                <option value="cringe">Cringe</option>
                <option value="other">other</option>
            </select>
            <?php 
                if($reportType!="commentReport"){

            ?>
                    <label for="description"> Describe further:</label>
                    
                    <textarea id="description" class="report__textarea"></textarea>
            <?php }?>
            <button type="submit" name="<?=@$reportType?>">Report</button>
        </form>
        <!-- <script src="../javascript/closeReport.js"></script>  -->
    </div>
</div>
