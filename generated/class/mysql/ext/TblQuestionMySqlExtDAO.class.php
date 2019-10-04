<?php
/**
 * Class that operate on table 'tbl_question'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-07 05:02
 */
class TblQuestionMySqlExtDAO extends TblQuestionMySqlDAO{

	// function getQuestionAnswer($userid){
	// 	$sql =" 

	// 			select 
	// 				tq.*,
	// 				ta.answer
	// 			from 
	// 				tbl_question tq
	// 			left join	 
	// 				tbl_answer ta
	// 			on 
	// 				ta.question_id = tq.id
	// 			left join
	// 				tbl_answer_transaction tat
	// 			on 
	// 				tat.id = ta.answer_transaction_id
	// 			where 
	// 				tat.user_id = $userid
	// 	";
	// 	$sqlQuery = new SqlQuery($sql);

	// 	return QueryExecutor::execute($sqlQuery);
	// }
	function getQuestionAnswer($userid,$ext){
		$sql =" 
				
				SELECT 
					question.id,
					question.question,
					question.lower_rate,
					question.higher_rate,
					answer.answer_transaction_id,
					answer.answer
				FROM 

					tbl_question question
				LEFT JOIN
					tbl_answer answer
				ON
					question.id = answer.question_id
				LEFT JOIN
				 	tbl_answer_transaction answer_trans
				ON
					answer_trans.id = answer.answer_transaction_id
				WHERE
					answer_trans.user_id = $userid
				$ext
		";
		$sqlQuery = new SqlQuery($sql);

		return QueryExecutor::execute($sqlQuery);
	}
	
}
?>