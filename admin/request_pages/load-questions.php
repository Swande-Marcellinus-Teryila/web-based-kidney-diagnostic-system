<?Php 
 require('autoloader.php');
include('../../includes/connectionpage.php'); 
try{  
$examControl= new ExamController();
    $results=$examControl->getQuestions("200","MTH101");
    $i=0;
     if(is_array($results)){

      foreach ($results as $result) {
        $i+=1;
     ?>

        
 <td><?Php echo $i?></td>
                                                            <td><?php echo htmlentities($result['question']);?></td>
                                                            <td><?php echo htmlspecialchars($result['option1']);?></td>
                                                            <td><?php echo htmlspecialchars($result['option2']);?></td>
                                                            <td><?php echo htmlspecialchars($result['option3']);?></td>
                                                             <td><?php echo htmlspecialchars($result['option4']);?></td>
                                                              <td><?php echo htmlspecialchars($result['option5']);?></td>
                                                          <td><?php echo  htmlspecialchars($result['answer']);?></td>
                                                            <td><img src="../images/q_photos/<?php echo $result['q_photo'];?>" alt="No Figure" class="img-responsive" ></td>
                                                      <td> 
                                       
                                                        <a href="#" onclick="deleteItem()"><i class="fa fa-close"></i></a>
                                                        
                                                    </td>
                                                       
                   <?php }}
$ajax=new Ajax();
                                                                                            
                        $dataInfo=json_encode(array('tableName'=>"questions",'passedId'=>$result['q_id'],"idName"=>"q_id",'successMessage'=>"question deleted successfully"));

                                $ajax->ajaxActWithId("deleteItem","showMessage","request_pages/delete-request.php","dataInfo",$dataInfo); 
                 } catch(Exception $e) {

    $error=$e->getMessage();
    
 }?>    
  