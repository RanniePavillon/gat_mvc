<?php
	$dataScore = $this->getScore;
	// print_r($dataScore);
	$dataAnswers = $this->getAnswers;

?>
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
					<td> 1.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[0]['answer']) ? $dataAnswers[0]['answer'] : 0?>" disabled> </b></span> </td>
					<td> 2.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[1]['answer']) ? $dataAnswers[1]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 3.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[2]['answer']) ? $dataAnswers[2]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 4.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[3]['answer']) ? $dataAnswers[3]['answer'] : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 7.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[6]['answer']) ? $dataAnswers[6]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 6.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[5]['answer']) ? $dataAnswers[5]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 5.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[4]['answer']) ? $dataAnswers[4]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 8.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[7]['answer']) ? $dataAnswers[7]['answer'] : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 13.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[12]['answer']) ? $dataAnswers[12]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 11.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[10]['answer']) ? $dataAnswers[10]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 9.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[8]['answer']) ? $dataAnswers[8]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 10.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[9]['answer']) ? $dataAnswers[9]['answer'] : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 15.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[14]['answer']) ? $dataAnswers[14]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 16.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[15]['answer']) ? $dataAnswers[15]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 12.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[11]['answer']) ? $dataAnswers[11]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 14.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[13]['answer']) ? $dataAnswers[13]['answer'] : 0?>" disabled></b> </span> </td>
				</tr>
				<tr>
					<td> 17.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[16]['answer']) ? $dataAnswers[16]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 18.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[17]['answer']) ? $dataAnswers[17]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 19.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[18]['answer']) ? $dataAnswers[18]['answer'] : 0?>" disabled></b> </span> </td>
					<td> 20.<span> <b><input type="text" class="rate" value="<?=isset($dataAnswers[19]['answer']) ? $dataAnswers[19]['answer'] : 0?>" disabled></b> </span> </td>
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