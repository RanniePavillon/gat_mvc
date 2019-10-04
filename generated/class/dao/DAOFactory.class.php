<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return TblAdminDAO
	 */
	public static function getTblAdminDAO(){
		return new TblAdminMySqlExtDAO();
	}

	/**
	 * @return TblAnswerDAO
	 */
	public static function getTblAnswerDAO(){
		return new TblAnswerMySqlExtDAO();
	}

	/**
	 * @return TblAnswerTransactionDAO
	 */
	public static function getTblAnswerTransactionDAO(){
		return new TblAnswerTransactionMySqlExtDAO();
	}

	/**
	 * @return TblQuestionDAO
	 */
	public static function getTblQuestionDAO(){
		return new TblQuestionMySqlExtDAO();
	}

	/**
	 * @return TblScoreDAO
	 */
	public static function getTblScoreDAO(){
		return new TblScoreMySqlExtDAO();
	}

	/**
	 * @return TblUserDAO
	 */
	public static function getTblUserDAO(){
		return new TblUserMySqlExtDAO();
	}


}
?>