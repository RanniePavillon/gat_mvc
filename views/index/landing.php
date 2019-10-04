<?php
	$dataQuestion = $this->getQuestions;
	$dataQuestionsAnswer = $this->getQuestionsAnswer;
	// $dataScore = $this->getScore;
	// $dataAnswers = $this->getAnswers;
	$user = Session::getSession('user');

	if(empty($dataAnswers)){
		$data = 0;
	} else{
		$data = 1;
	}

	$checkTrans = DAOFactory::getTblAnswerTransactionDAO()->queryByUserId($user['id']);
	if(empty(Session::getSession('start'))){
		if(empty($checkTrans)){
			$start = 0;
		} else {
			if($checkTrans[0]->status=='saved'){
				$start = 2;
			} else {
				$start = 3;
			}
		}
	} else {
		if($checkTrans[0]->status=='saved'){
			$start = 1;
		} else {
			$start = 3;
		}

	}

?>
<script>
	var data = "<?=$data?>";
	var start = "<?=$start?>";
</script>

<?php if(!empty(Session::getSession('start'))):?>


	
<script>
	
	$(function(){
		var item = "<?=Session::getSession('start')['lastQuestion']?>";

		setInterval(function(){
			var newitem = item++;

			var itemAnswer = $('.item'+newitem).val();
			$('.item'+newitem).prop('readonly',true);
			if(itemAnswer==''){
				itemAnswer = 1;
				$('.item'+newitem).val(itemAnswer);
			}
			// alert(itemAnswer);
			$.post(URL+"index/saveAnswer", {'answer':itemAnswer ,'question': newitem})
			.done(function(returnData){
				// $('html,body').animate({
		  //       	scrollTop: $('.itemQ'+newitem).offset().top
		  //       },'slow');
			})

			return false;
		},30000);


		var divItem = ".itemQ<?=Session::getSession('start')['lastQuestion']-1?>";
		// alert(divItem)
		if(divItem == '.itemQ-1'){
			$('html,body').animate({
	        	scrollTop: $('.itemQ20').offset().top
	        },'slow');
		} else {
	        $('html,body').animate({
	        	scrollTop: $(divItem).offset().top
	        },'slow');
		}

						
	})
</script>



<div id="questions">



	<form method="post" id="answerForm">
		<div class="container bg">

			<div class="row mar-top pad">
				<div class="text-center">
					<p>
						<h3> <strong> GROWTH ADAPTABILITY TEST </strong> </h3> 
					</p>
				</div>
			
			</div>
			
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="100"></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- Q1 -->
						<?php $item=1;//if(!empty($dataQuestionsAnswer)):  ?>

							<?php foreach($dataQuestionsAnswer as $each): ?>

								<tr class="itemQ<?=$each['id']?>">
									<td> 
										<input type="text" class="rate txtAnswer item<?=$item++?>" value="<?=  isset($each['answer']) ? $each['answer'] : ''  ?>" name="answer[]" width="10px" required <?=  isset($each['answer']) ? '' : 'readonly'  ?>> <?= $each['id'] ?>.
										<input type="hidden" name="questionid[]" value="<?= $each['id'] ?>"> 
									</td>
									<td> 
										<p>
											<?= $each['question'] ?>
										</p> 
									</td>
									<td> <?= $each['lower_rate'] ?> </td>

									<?php if($each['id'] % 2 == 0): ?> 
										<td> 5 </td> 
										<td> 4 </td>
										<td> 3 </td>
										<td> 2 </td>
										<td> 1 </td>
									<?php else: ?>
										<td> 1 </td> 
										<td> 2 </td>
										<td> 3 </td>
										<td> 4 </td>
										<td> 5 </td>
									<?php endif;?>

									<td> <?= $each['higher_rate'] ?> </td>
								</tr>

							<?php endforeach; ?>

					</tbody>
				</table>
			</div>

			<div class="mb-100 mt-20">
				<button type="submit" class="btn btn-default center-block btn-lg btn-me-submit" <?= $checkTrans[0]->status=='done' ? 'disabled' : ''?>> SUBMIT</button>
			</div>
		</div>
	</form>


</div>
<?php endif;?>

<div id="results">


	<div class="container bg mb-100">
		<!-- Scoring -->
		<div class="row mar-top pad">
			<h3> <strong> Scoring </strong> </h3>
			<p>
				Your GAT response is comprised of four CORE dimensions.  Understanding them is the 
				first step toward improving your response to growth adaptability, expanding your capacity, 
				and, ultimately, increasing your overall GAT. 
			</p>
		</div>
		
		<!-- Score Tally -->
		<table class="table text-center">
			<thead>
				<tr class="text-center">
					<td><strong> C </strong></td>
					<td><strong> O </strong></td>
					<td><strong> R </strong></td>
					<td><strong> E </strong></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> 1.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[0]->answer) ? $dataAnswers[0]->answer : 0?>" disabled> </b></span> </td>
					<td> 2.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[1]->answer) ? $dataAnswers[1]->answer : 0?>" disabled></b> </span> </td>
					<td> 3.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[2]->answer) ? $dataAnswers[2]->answer : 0?>" disabled></b> </span> </td>
					<td> 4.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[3]->answer) ? $dataAnswers[3]->answer : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 7.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[6]->answer) ? $dataAnswers[6]->answer : 0?>" disabled></b> </span> </td>
					<td> 6.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[5]->answer) ? $dataAnswers[5]->answer : 0?>" disabled></b> </span> </td>
					<td> 5.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[4]->answer) ? $dataAnswers[4]->answer : 0?>" disabled></b> </span> </td>
					<td> 8.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[7]->answer) ? $dataAnswers[7]->answer : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 13.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[12]->answer) ? $dataAnswers[12]->answer : 0?>" disabled></b> </span> </td>
					<td> 11.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[10]->answer) ? $dataAnswers[10]->answer : 0?>" disabled></b> </span> </td>
					<td> 9.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[8]->answer) ? $dataAnswers[8]->answer : 0?>" disabled></b> </span> </td>
					<td> 10.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[9]->answer) ? $dataAnswers[9]->answer : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 15.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[14]->answer) ? $dataAnswers[14]->answer : 0?>" disabled></b> </span> </td>
					<td> 16.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[15]->answer) ? $dataAnswers[15]->answer : 0?>" disabled></b> </span> </td>
					<td> 12.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[11]->answer) ? $dataAnswers[11]->answer : 0?>" disabled></b> </span> </td>
					<td> 14.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[13]->answer) ? $dataAnswers[13]->answer : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 17.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[16]->answer) ? $dataAnswers[16]->answer : 0?>" disabled></b> </span> </td>
					<td> 18.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[17]->answer) ? $dataAnswers[17]->answer : 0?>" disabled></b> </span> </td>
					<td> 19.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[18]->answer) ? $dataAnswers[18]->answer : 0?>" disabled></b> </span> </td>
					<td> 20.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[19]->answer) ? $dataAnswers[19]->answer : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> Total C =<span> <b><input type="text" class="rate" value="<?=isset($dataScore[0]->cTotal) ? $dataScore[0]->cTotal : 0?>" disabled></b> </span> </td>
					<td> Total O =<span> <b><input type="text" class="rate" value="<?=isset($dataScore[0]->oTotal) ? $dataScore[0]->oTotal : 0?>" disabled></b> </span> </td>
					<td> Total R =<span> <b><input type="text" class="rate" value="<?=isset($dataScore[0]->rTotal) ? $dataScore[0]->rTotal : 0?>" disabled></b> </span> </td>
					<td> Total E =<span> <b><input type="text" class="rate" value="<?=isset($dataScore[0]->eTotal) ? $dataScore[0]->eTotal : 0?>" disabled></b> </span> </td>
				</tr>
			</tbody>
		</table>


		<div class="row text-center">
			<div class="col-xs-4 col-xs-offset-4">
			
			<?php if($dataScore[0]->overallTotal >= 166): ?>
			
				<!-- <span style="font-size: 30px"> <b>ABOVE AVERAGE</b> </span>  -->

				<table class="table">
					<tbody>
						<tr>
							<th>SCORE</th>
							<td><?= $dataScore[0]->overallTotal?></td>
						</tr>
						<tr>
							<th>INTERPRETATION</th>
							<td>ABOVE AVERAGE</td>
						</tr>
						<tr>
							<th>REMARKS</th>
							<td>Passed</td>
						</tr>
					</tbody>
				</table> 
						
			<?php elseif($dataScore[0]->overallTotal >= 114 ):	?>

				<!-- <span style="font-size: 30px"> <b>AVERAGE</b> </span> -->
				<table class="table">
					<tbody>
						<tr>
							<th>SCORE</th>
							<td><?= $dataScore[0]->overallTotal?></td>
						</tr>
						<tr>
							<th>INTERPRETATION</th>
							<td>AVERAGE</td>
						</tr>
						<tr>
							<th>REMARKS</th>
							<td>Passed</td>
						</tr>
					</tbody>
				</table> 

			<?php elseif($dataScore[0]->overallTotal >= 0 ): ?>

				<!-- <span style="font-size: 30px"> <b>BELOW AVERAGE</b> </span> -->
				<table class="table">
					<tbody>
						<tr>
							<th>SCORE</th>
							<td><?= $dataScore[0]->overallTotal?></td>
						</tr>
						<tr>
							<th>INTERPRETATION</th>
							<td>BELOW AVERAGE</td>
						</tr>
						<tr>
							<th>REMARKS</th>
							<td>Failed</td>
						</tr>
					</tbody>
				</table> 

			<?php endif; ?>
			</div>

		</div>
		
		<div class="row pad">
			<h3><strong> Now, look at your CORE breakdown and determine which aspects of the GAT you need to improve.  </strong></h3>
		</div>
		
		<!-- C -->
		<div class="row pad">
			<h3><strong> C = Control </strong></h3>
			<p>
				<em>To what extent can you influence the situation? </em>
				<br>
				<br>
				<em>How much control do you perceive you have?  </em>
			</p>
			<p>
				Those with higher GATs perceive they have significantly more control and influence 
				in adverse situations than do those with lower GATs.  Even in situations that appear 
				overwhelming or out of their hands, those with higher GATs find some facet of the 
				situation they can influence.  Those with lower GATs respond as if they have little 
				or no control and often give up.  
			</p>
		</div>
		
		<!-- O -->
		<div class="row pad">
			<h3><strong> O = Ownership  </strong></h3>
			<p>
				<em>To what extent do you hold yourself responsible for improving this situation?  </em>
				<br>
				<br>
				<em>To what extent are you accountable to play some role in making it better?   </em>
			</p>
			<p>
				Accountability is the backbone of action.  Those with higher GATs hold themselves 
				accountable for dealing with situations regardless of their cause.  Those with 
				lower GATs deflect accountability and most often feel victimized and helpless.  
			</p>
		</div>
		
		<!-- R -->
		<div class="row pad">
			<h3><strong> R = Reach  </strong></h3>
			<p>
				<em>How far does the fallout of this situation reach into other areas of your work or life?  </em>
				<br>
				<br>
				<em>To what extent does the growth adaptability extend beyond the situation at hand?   </em>
			</p>
			<p>
				Keeping the fallout under control and limiting the reach of growth adaptability is essential 
				for efficient and effective problem solving.  Those with higher GATs keep setbacks 
				and challenges in their place, not letting them infest the healthy areas of their 
				work and lives.  Those with lower GATs tend to catastrophize, allowing a setback 
				in one area to bleed into other, unrelated areas and become destructive.  
			</p>
		</div>
		
		<!-- E -->
		<div class="row pad">
			<h3><strong> E = Endurance  </strong></h3>
			<p>
				<em>How long will the growth adaptability endure? </em>
			</p>
			<p>
				Seeing beyond even enormous difficulties is an essential skill for maintaining hope. 
				Those with higher GATs have the uncanny ability to see past the most interminable 
				difficulties and maintain hope and optimism.  Those with lower GATs see growth adaptability as
				dragging on indefinitely, if not permanently.  
			</p>
		</div>
	</div>

</div>







<div id="loaderModal" class="modal modal-me fade" role="dialog">
	<div class="modal-dialog">
	  	<div class="loader"></div>
	</div>
</div>


<div id="successModal" class="modal modal-me fade" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-body text-center">
			     <h2 class=" text-center text-success">
					<strong>Thank You!</strong>
				

				</h2>
				<h3 class=" text-center text-success">
					Exam results will be discussed to you by Recruitment team.
				</h3>
			</div>
			<div class="modal-footer">
				<div class="text-center">
			    	<a href="<?=URL?>user/logout" class="btn btn-success btn-lg btn-block"><strong>OK</strong></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="instructionModal" class="modal modal-me fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			    <h3 class="text-info  text-center">Instructions</h3>
			    <hr>
			    <p class=" text-center">
					<strong>Growth Adaptability Test (GAT)</strong> is developed to guide individuals in their careers.  
					<br>
					<br>
					<strong>Imagine the following events as if they are happening right now.</strong>
					<br>

				</p>
				<ul>
					<li>Select 1 as the least and 5 as the most on every choice appropriate for the situation. </li>
					<li>You have only  thirty (30) seconds to respond to each situation, if not, then it will be automatically answered one (1) as the least.</li>
					<li>Every 30 seconds a question will be disabled</li>
					<li>Once you've pressed the start button the timer will start.</li>
				</ul>
					<br>
			</div>
			<div class="modal-footer">
				<div class="text-center">
			    	<a href="<?=URL?>index/startExam" class="btn btn-success btn-block btn-lg"><strong>START</strong></a>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="instructionModal2" class="modal modal-me fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			    <!-- <h3 class="text-info  text-center">Instructions</h3> -->
			    <!-- <hr> -->
			    <h3 class=" text-center">
					<!-- <strong>Growth Adaptability Test (GAT)</strong> is developed to guide individuals in their careers.  
					<br>
					<br> -->
					<strong>You have started your test</strong>
					<br>
					<strong>Continue where you left off</strong>

				</h3>
				<!-- <ul>
					<li>Select 1 as the least and 5 as the most on every choice appropriate for the situation. </li>
					<li>You have 30 seconds to respond to each situation</li>
					<li>Once you've pressed the start button the timer will start</li>
					<li>Every 30 seconds a question will be disabled</li>
				</ul> -->
					<br>
			</div>
			<div class="modal-footer">
				<div class="text-center">
			    	<a href="<?=URL?>index/startExam" class="btn btn-success btn-block btn-lg"><strong>START</strong></a>
				</div>
			</div>
		</div>
	</div>
</div>