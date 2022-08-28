<?php if($msg){?> <br><br>
                                                            <div class="alert alert-success fa fa-check"> <?=$msg?></div>
                                                        <?php } if($error){?><br><br>
                                                            <div class="alert alert-danger" id="danger_alert"><i class="fa fa-close"></i> <center><?=$error?></center></div>
                                                        <?php } ?>
