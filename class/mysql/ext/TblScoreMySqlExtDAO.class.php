<?php
/**
 * Class that operate on table 'tbl_score'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-07 05:02
 */
class TblScoreMySqlExtDAO extends TblScoreMySqlDAO{

	function getCORE($userid,$ids){
		$sql= "

				select 
					sum(answer) as sum
				from 
					tbl_answer ta
				inner join 
					tbl_answer_transaction tat
				on
					tat.id = ta.answer_transaction_id
				where 
					ta.question_id 
				in
					$ids
				and 
					tat.user_id = $userid

		";
		$sqlQuery = new SqlQuery($sql);

		return QueryExecutor::execute($sqlQuery);
	}
	function score(){
		$sql = "
				SELECT *
				FROM
					tbl_score ts
				LEFT JOIN
					tbl_user tu
				ON
					tu.id = ts.user_id
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>