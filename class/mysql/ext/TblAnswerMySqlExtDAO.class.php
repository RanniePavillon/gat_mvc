<?php
/**
 * Class that operate on table 'tbl_answer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-07 05:02
 */
class TblAnswerMySqlExtDAO extends TblAnswerMySqlDAO{
	
	function report($userid){
		$sql = "
				SELECT *
				FROM
					tbl_answer ts
				LEFT JOIN
					tbl_user tu
				ON
					tu.id = ts.user_id

				WHERE 
					ts.user_id = $userid
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
	public function queryByQuestionIdAndTransId($qid,$transid){
		$sql = 'SELECT * FROM tbl_answer WHERE question_id = ? AND answer_transaction_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($qid);
		$sqlQuery->setNumber($transid);
		return $this->getList($sqlQuery);
	}
}
?>